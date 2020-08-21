<?php

namespace Demo\SendMailAfterAddToCart\Observer;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Model\ScopeInterface;

class SendMailToAdmin implements ObserverInterface
{
    protected $_transportBuilder;
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var \Demo\SendMailAfterAddToCart\Helper\Data
     */
    private \Demo\SendMailAfterAddToCart\Helper\Data $dataAllowedUrl;

    public function __construct(
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        ScopeConfigInterface $scopeConfig,
        \Demo\SendMailAfterAddToCart\Helper\Data $dataAllowedUrl
    ) {
        $this->_transportBuilder = $transportBuilder;
        $this->scopeConfig = $scopeConfig;
        $this->dataAllowedUrl = $dataAllowedUrl;
    }

    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.

        $isEnabled = $this->dataAllowedUrl->isUsingStaticUrlsAllowed();
        $email = $this->dataAllowedUrl->getEmail();
        //getValue('sent_cart_to_admin/general/enable',ScopeInterface::SCOPE_STORE);

        if ($isEnabled) {

            //$email = $this->scopeConfig->getValue('trans_email/ident_general/email',ScopeInterface::SCOPE_STORE);
            //$name = $this->scopeConfig->getValue('trans_email/ident_general/name',ScopeInterface::SCOPE_STORE);

            $report = [
                'email' => $email,
                'product_id' => $observer->getData('quote_item')->getData('product_id'),
                'product_name' => $observer->getData('quote_item')->getData('name'),
                'product_qty' => $observer->getData('quote_item')->getData('qty'),
                'product_price' => $observer->getData('quote_item')->getData('price')
            ];

            $postObject = new \Magento\Framework\DataObject();
            $postObject->setData($report);

            try {
                $transport = $this->_transportBuilder
                    ->setTemplateIdentifier('send_to_admin_cart')
                    ->setTemplateOptions(['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID])
                    ->setTemplateVars(['data' => $postObject])
                    ->setFrom(['name' => 'Robot', 'email' => 'robot@server.com'])
                    ->addTo($email)
                    ->getTransport();
                $transport->sendMessage();
            } catch (\Exception $e) {
                throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
            }
        } else {
            return $this;
        }
    }
}

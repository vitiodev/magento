<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\Layout;

class Content implements HttpGetActionInterface
{
    protected JsonFactory $jsonFactory;

    protected RequestInterface $request;

    protected Layout $layout;

    public function __construct(
        JsonFactory $jsonFactory,
        RequestInterface $request,
        Layout $layout
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->request = $request;
        $this->layout = $layout;
    }

    public function execute()
    {
        $httpBadRequestCode = 400;
        //Check isXmlHttpRequest
        if (!$this->request->isXmlHttpRequest()) {
            return $this->jsonFactory->create()->setHttpResponseCode($httpBadRequestCode);
        }

        $html = $this->layout->getLayout()
            ->createBlock('Overdose\Testimonials\Block\FeedbackList')
            ->setTemplate('Overdose_Testimonials::feedback_list.phtml')
            ->toHtml();

        $resultJson = $this->jsonFactory->create();
        return $resultJson->setData(['html' => $html]);
    }
}

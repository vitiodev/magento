<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Checkout\Controller\Action;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Overdose\Testimonials\Model\Imageupload\ImageUploader;

class Save extends Action
{
    private ImageUploader $imageUploader;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        CustomerRepositoryInterface $customerRepository,
        ImageUploader $imageUploader,
        AccountManagementInterface $accountManagement
    ) {
        $this->imageUploader = $imageUploader;
        parent::__construct($context, $customerSession, $customerRepository, $accountManagement);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();

        $this->_redirect('*/');

        return $data;
    }
}

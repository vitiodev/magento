<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    protected $resultPageFactory;

    public function __construct(PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->set(__('Feedback'));

        return $page;
    }
}

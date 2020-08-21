<?php

namespace Demo\UiComponent\Controller\Index;

use Magento\Checkout\Controller\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
        // TODO: Implement execute() method.
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

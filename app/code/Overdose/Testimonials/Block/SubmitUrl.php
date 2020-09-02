<?php

namespace Overdose\Testimonials\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;

class SubmitUrl extends Template
{

    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        return $this->getUrl('feedback/index/save', ['_secure' => true]);
    }
}

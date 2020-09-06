<?php

namespace Overdose\Testimonials\Block;

use Magento\Framework\View\Element\Template;

class FeedbackList extends Template
{
    protected \Overdose\Testimonials\Model\ResourceModel\FeedbackRepository $feedbackRepository;

    public function __construct(
        Template\Context $context,
        \Overdose\Testimonials\Model\ResourceModel\FeedbackRepository $feedbackRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->feedbackRepository = $feedbackRepository;
    }

    public function getList()
    {
        return $this->feedbackRepository->getCollection();
    }
}

<?php

namespace Overdose\Testimonials\Block;

use Magento\Framework\View\Element\Template;

class FeedbackList extends Template
{
    protected \Overdose\Testimonials\Model\ResourceModel\FeedbackRepository $feedbackRepository;

//    protected $_template = 'Overdose_Testimonials::feedback_list.phtml';

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
        return $this->feedbackRepository->getFeedbackCollection();
    }
}

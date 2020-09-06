<?php

namespace Overdose\Testimonials\Model\ResourceModel;

class FeedbackRepository implements \Overdose\Testimonials\Api\FeedbackRepositoryInterface
{
    protected $feedbackFactory;
    protected $collectionFactory;

    public function __construct(
        \Overdose\Testimonials\Model\FeedbackFactory $feedbackFactory,
        \Overdose\Testimonials\Model\ResourceModel\Feedback\CollectionFactory $collectionFactory
    ) {
        $this->feedbackFactory = $feedbackFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function save($data)
    {
        $rowData = $this->feedbackFactory->create();
        $rowData->setData($data);
        if (isset($data['id'])) {
            $rowData->setEntityId($data['id']);
        }
        return $rowData->save();
    }

    public function getCollection()
    {
        return $this->collectionFactory->create();
    }
}

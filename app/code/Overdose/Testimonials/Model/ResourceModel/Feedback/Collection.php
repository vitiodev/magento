<?php
namespace Overdose\Testimonials\Model\ResourceModel\Feedback;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'feedback_collection';
    protected $_eventObject = 'feedback_obj_collection';


    protected function _construct()
    {
        $this->_init('Overdose\Testimonials\Model\Feedback', 'Overdose\Testimonials\Model\ResourceModel\Feedback');
    }

}

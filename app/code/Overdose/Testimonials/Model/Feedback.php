<?php
namespace Overdose\Testimonials\Model;

class Feedback extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'feedback_list';

    protected $_cacheTag = 'feedback_list';

    protected $_eventPrefix = 'feedback_list';

    protected function _construct()
    {
        $this->_init('Overdose\Testimonials\Model\ResourceModel\Feedback');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}

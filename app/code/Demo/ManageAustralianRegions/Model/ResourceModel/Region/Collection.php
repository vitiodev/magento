<?php
namespace Demo\ManageAustralianRegions\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id_region';
    protected $_eventPrefix = 'demo_manage_region_collection';
    protected $_eventObject = 'region_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Demo\ManageAustralianRegions\Model\Region', 'Demo\ManageAustralianRegions\Model\ResourceModel\Region');
    }

}

<?php
namespace Demo\AuRegions\Model\ResourceModel\Region;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'region_id';
    protected $_eventPrefix = 'demo_manage_region_collection';
    protected $_eventObject = 'region_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Demo\AuRegions\Model\Region', 'Demo\AuRegions\Model\ResourceModel\Region');
    }


}

<?php
namespace Demo\AuRegions\Model;

class Region extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'demo_manage_region';

    protected $_cacheTag = 'demo_manage_region';

    protected $_eventPrefix = 'demo_manage_region';

    protected function _construct()
    {
        $this->_init('Demo\AuRegions\Model\ResourceModel\Region');
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

<?php
namespace Demo\ManageAustralianRegions\Model\ResourceModel;


class Region extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('demo_australian_regions', 'id_region');
    }

}

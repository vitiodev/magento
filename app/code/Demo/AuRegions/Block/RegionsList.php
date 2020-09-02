<?php

namespace Demo\AuRegions\Block;

use Magento\Framework\View\Element\Template;

class RegionsList extends Template
{
    protected \Demo\AuRegions\Model\ResourceModel\RegionRepository $regionRepository;

    public function __construct(
        Template\Context $context,
        \Demo\AuRegions\Model\ResourceModel\RegionRepository $regionRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->regionRepository = $regionRepository;
    }

    public function getList()
    {
        return $this->regionRepository->getFilterCollection();
    }
}

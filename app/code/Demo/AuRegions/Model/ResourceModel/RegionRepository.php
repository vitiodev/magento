<?php

namespace Demo\AuRegions\Model\ResourceModel;


use Magento\Store\Model\StoreManager;

class RegionRepository implements \Demo\AuRegions\Api\RegionRepositoryInterface
{
    protected $regionFactory;
    protected $collectionFactory;
    /**
     * @var StoreManager
     */
    private StoreManager $storeManager;

    public function __construct(
        \Demo\AuRegions\Model\RegionFactory $regionFactory,
        \Demo\AuRegions\Model\ResourceModel\Region\CollectionFactory $collectionFactory,
        StoreManager $storeManager
    ) {
        $this->regionFactory = $regionFactory;
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
    }

    public function save($data)
    {
        $rowData = $this->regionFactory->create();
        $rowData->setData($data);
        if (isset($data['region_id'])) {
            $rowData->setEntityId($data['region_id']);
        }
        return $rowData->save();
    }

    public function delete($data)
    {
        $rowData = $this->regionFactory->create();
        if (isset($data['id'])) {
            $rowData->load($data['id']);
        }
        return $rowData->delete();
    }

    public function filterActive($collection)
    {

        return $collection->addFieldToFilter('status', '1');

    }

    public function filterByStore($collection)
    {

        $storeId = $this->storeManager->getStore()->getId();
        return $collection->addFieldToFilter('store_id', $storeId);

    }

    public function getFilterCollection()
    {
        $collection = $this->collectionFactory->create();

        $this->filterActive($collection);

        return $this->filterByStore($collection);
    }
}

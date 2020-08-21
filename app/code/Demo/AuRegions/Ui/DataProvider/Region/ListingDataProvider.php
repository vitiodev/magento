<?php

namespace Demo\AuRegions\Ui\DataProvider\Region;

use Demo\AuRegions\Model\ResourceModel\Region\CollectionFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;

class ListingDataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    protected $_loadedData;
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ReportingInterface $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
//        if (isset($this->_loadedData)) {
//            return $this->_loadedData;
//        }
//
//        $items = $this->collection->getItems();
//
//        $storeId = $this->request->getParam('store');
//
//        $i = 0;
//
//        foreach ($items as $region) {
//            if ($storeId == $region->getData('store_id')) {
//                $this->_loadedData[$i] = $region->getData();
//                $i++;
//            }
//        }
//
//        return ['totalRecords' => $i, 'items' => $this->_loadedData];

        return parent::getData();
    }
}

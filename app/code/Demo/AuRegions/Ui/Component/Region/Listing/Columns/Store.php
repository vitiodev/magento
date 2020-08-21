<?php

namespace Demo\AuRegions\Ui\Component\Region\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Websites listing column component.
 *
 * @api
 * @since 100.0.2
 */
class Store extends Column
{
    /**
     * @var \Magento\Framework\App\State
     */
    private \Magento\Framework\App\State $state;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private \Magento\Store\Model\StoreManagerInterface $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\App\State $state,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->state = $state;
        $this->storeManager = $storeManager;
    }

    public function getStoreList()
    {
        return $this->storeManager->getStores();
    }

    public function prepareDataSource(array $dataSource)
    {
        foreach ($dataSource['data']['items'] as &$region) {
            $name = $this->storeManager->getDefaultStoreView()->getName();

            foreach ($this->getStoreList() as &$item) {
                if ($item->getData('store_id') == $region['store_id']) {
                    $name = $item->getName();
                }
            }

            $region[$this->getData('name')] = $name;
        }

        return $dataSource;
    }
}

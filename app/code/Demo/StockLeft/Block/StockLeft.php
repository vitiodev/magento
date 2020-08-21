<?php

namespace Demo\StockLeft\Block;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class StockLeft extends Template
{
    private $registry;
    private $stockRegistry;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        StockRegistryInterface $stockRegistry,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->stockRegistry = $stockRegistry;
    }

    public function getRemainingQty() {
        $product = $this->getCurrentProduct();
        $stock = $this->stockRegistry->getStockItem($product->getId());
        return $stock->getQty();
    }

    protected function getCurrentProduct() {
        return $this->registry->registry('product');
    }
}

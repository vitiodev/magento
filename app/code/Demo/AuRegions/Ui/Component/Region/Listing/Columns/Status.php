<?php

namespace Demo\AuRegions\Ui\Component\Region\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Status extends Column
{
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {

        foreach ($dataSource['data']['items'] as &$item) {
            $item[$this->getData('name')] = $item[$this->getData('name')] == "0" ? "Disable" : "Enable";
        }

        return $dataSource;
    }
}

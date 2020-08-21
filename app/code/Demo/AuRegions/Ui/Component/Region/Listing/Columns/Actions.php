<?php

namespace Demo\AuRegions\Ui\Component\Region\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    const EDIT_PATH = 'regions/manage/edit';
    const DELETE_PATH = 'regions/manage/delete';
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $storeId = $this->context->getFilterParam('region_id');

            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->urlBuilder->getUrl(
                            $this::EDIT_PATH,
                            ['id' => $item['region_id']]
                        ),
                        'label' => __('Edit'),
                        'hidden' => false,
                    ],
                    'delete' => [
                        'href' => $this->urlBuilder->getUrl(
                            $this::DELETE_PATH,
                            ['id' => $item['region_id']]
                        ),
                        'label' => __('Delete'),
                        'hidden' => false,
                    ]
                ];
            }
        }

        return $dataSource;
    }
}

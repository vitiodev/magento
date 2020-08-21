<?php

namespace Demo\Grid\Plugin;

use Demo\Grid\Ui\DataProvider\Category\ListingDataProvider as CategoryDataProvider;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class AddAttributesToUiDataProvider
{
    /** @var AttributeRepositoryInterface */
    private $attributeRepository;

    /** @var ProductMetadataInterface */
    private $productMetadata;

    /**
    * Constructor
    *
    * @param \Magento\Eav\Api\AttributeRepositoryInterface $attributeRepository
    * @param \Magento\Framework\App\ProductMetadataInterface $productMetadata
    */
    public function __construct(
            AttributeRepositoryInterface $attributeRepository,
            ProductMetadataInterface $productMetadata
    )
    {
            $this->attributeRepository = $attributeRepository;
            $this->productMetadata = $productMetadata;
    }

    /**
    * Get Search Result after plugin
    *
    * @param \Demo\Grid\Ui\DataProvider\Category\ListingDataProvider $subject
    * @param \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult $result
    * @return \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
    */
    public function afterGetSearchResult(CategoryDataProvider $subject, SearchResult $result)
    {
        if ($result->isLoaded()) {
            return $result;
        }

        $edition = $this->productMetadata->getEdition();

        $column = 'entity_id';

        if ($edition == 'Enterprise') {
            $column = 'row_id';
        }

        $attribute = $this->attributeRepository->get('catalog_category', 'name');

        $result->getSelect()->joinLeft(
        ['demogridname' => $attribute->getBackendTable()],
        'demogridname.' . $column . ' = main_table.' . $column . ' AND demogridname.attribute_id = '
        . $attribute->getAttributeId(),
        ['name' => 'demogridname.value']
        );

        $result->getSelect()->where('demogridname.value LIKE "B%"');

        return $result;
    }
}

<?php

namespace Demo\GetAttribute\Plugin;

class Product
{

    public function afterGetName(\Magento\Catalog\Model\Product $product, $name)
    {
        $attribure = $product->getAttributeText('alternative_color');
        $name .= " Attribute color is " . $attribure;
        return $name;
    }
}

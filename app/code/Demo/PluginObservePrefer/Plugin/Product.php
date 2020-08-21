<?php

namespace Demo\PluginObservePrefer\Plugin;

class Product
{

    public function afterGetName(\Magento\Catalog\Model\Product $product, $name) {
        $price = $product->getData('price');
        if ($price < 60) {
            $name .= " So cheap";
        }
        else {
            $name .= " So bloody expensive";
        }

        return $name;
    }

}

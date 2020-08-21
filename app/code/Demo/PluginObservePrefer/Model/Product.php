<?php

namespace Demo\PluginObservePrefer\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName() {
        $name = parent::getName();

        $price = $this->getData('price');
        if ($price < 60) {
            $name .= " cheap from preference";
        } else {
            $name .= " expensive from preference";
        }

        return $name;
    }
}

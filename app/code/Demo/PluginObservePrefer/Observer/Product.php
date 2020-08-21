<?php

namespace Demo\PluginObservePrefer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Product implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $collection = $observer->getEvent()->getData('collection');
        foreach ($collection as $product) {
            $price = $product->getData('price');
            $name = $product->getData('name');
            if ($price < 60) {
                $name .= " cheap from observer";
            } else {
                $name .= " expensive from observer";
            }
            $product->setData('name',$name);
        }
    }
}

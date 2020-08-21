<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Demo\AuRegions\Block\Adminhtml\Region\Edit\Button;

use Magento\Ui\Component\Control\Container;

/**
 * Class Save
 */
class Save extends Generic
{
    /**
     * {@inheritdoc}
     */


    public function getButtonData()
    {

        return [
            'label' => __('Save'),
            'on_click' => sprintf("location.href = '%s';", $this->getSaveUrl()),
            'class' => 'primary',
            'sort_order' => 10
        ];
    }

    private function getSaveUrl()
    {
        return $this->getUrl('*/*/save');
    }

}

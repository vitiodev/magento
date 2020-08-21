<?php

namespace Demo\SendMailAfterAddToCart\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const CONFIG_USE_STATIC_URLS = 'sent_cart_to_admin/general/enable';

    const CONFIG_USE_NAME_EMAIL = 'sent_cart_to_admin/general/send_to';

    public function isUsingStaticUrlsAllowed()
    {
        return $this->scopeConfig->isSetFlag(
            self::CONFIG_USE_STATIC_URLS,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getEmail()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_USE_NAME_EMAIL,
            ScopeInterface::SCOPE_STORE
        );
    }
}

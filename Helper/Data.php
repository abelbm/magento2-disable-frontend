<?php

namespace Abelbm\DisableFrontend\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper{

    /**
     * Get value from config
     *
     * @author Abel Bolanos Martinez <abelbmartinez@gmail.com>
     * @return mixed
     */
    public function getConfigValue() {
        return $this->scopeConfig->getValue(
            'admin/disable_frontend/show_as_frontend', ScopeInterface::SCOPE_WEBSITE
        );
    }
}
<?php

namespace App\Service\System;

/**
 * Class LicenseService
 * @package App\Service\System
 */
class LicenseService
{
    /**
     * 授权信息内容
     * @return string
     */
    public function license_info()
    {
        if (config('shop.licensed') > 0) {
            /* 获取HOST */
            if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
                $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
            } elseif (isset($_SERVER['HTTP_HOST'])) {
                $host = $_SERVER['HTTP_HOST'];
            }
            $url_domain = url_domain();
            $host = 'http://' . $host . $url_domain;
            $license = '<a href="http://www.ecshop.com/license.php?product=ecshop_b2c&url=' . urlencode($host) . '" target="_blank"
>&nbsp;&nbsp;Licensed</a>';
            return $license;
        } else {
            return '';
        }
    }
}

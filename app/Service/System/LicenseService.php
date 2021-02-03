<?php

namespace App\Service\System;

/**
 * Class LicenseService
 * @package App\Service\System
 */
class LicenseService
{
    /**
     * 获得网店 license 信息
     *
     * @access  public
     * @param integer $size
     *
     * @return  array
     */
    public function get_shop_license()
    {
        // 取出网店 license
        $sql = "SELECT code, value
            FROM " . table('shop_config') . "
            WHERE code IN ('certificate_id', 'token', 'certi')
            LIMIT 0,3";
        $license_info = $GLOBALS['db']->getAll($sql);
        $license_info = is_array($license_info) ? $license_info : array();
        $license = array();
        foreach ($license_info as $value) {
            $license[$value['code']] = $value['value'];
        }

        return $license;
    }

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

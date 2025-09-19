<?php

declare(strict_types=1);

namespace app\plugins\payment;

class Cod
{
    public function config()
    {

        /* 模块的基本信息 */
        if (isset($set_modules) && $set_modules == true) {
            $i = isset($modules) ? count($modules) : 0;

            /* 代码 */
            $modules[$i]['code'] = basename(__FILE__, '.php');

            /* 描述对应的语言项 */
            $modules[$i]['desc'] = 'cod_desc';

            /* 是否支持货到付款 */
            $modules[$i]['is_cod'] = '1';

            /* 是否支持在线支付 */
            $modules[$i]['is_online'] = '0';

            /* 支付费用，由配送决定 */
            $modules[$i]['pay_fee'] = '0';

            /* 作者 */
            $modules[$i]['author'] = 'ECSHOP TEAM';

            /* 网址 */
            $modules[$i]['website'] = 'http://www.ecshop.com';

            /* 版本号 */
            $modules[$i]['version'] = '1.0.0';

            /* 配置信息 */
            $modules[$i]['config'] = [];

            return;
        }
    }

    /**
     * 提交函数
     */
    public function get_code()
    {
        return '';
    }

    /**
     * 处理函数
     */
    public function response() {}
}

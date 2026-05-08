<?php

namespace App\Plugins\Payment;

$payment_lang = ROOT_PATH.'languages/'.$GLOBALS['_CFG']['lang'].'/payment/balance.php';

if (file_exists($payment_lang)) {
    global $_LANG;

    include_once $payment_lang;
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == true) {
    $i = isset($modules) ? count($modules) : 0;

    $modules[$i]['code'] = basename(__FILE__, '.php');
    $modules[$i]['desc'] = 'balance_desc';
    $modules[$i]['is_cod'] = '0';
    $modules[$i]['is_online'] = '1';
    $modules[$i]['author'] = 'ECSHOP TEAM';
    $modules[$i]['website'] = 'http://www.ecshop.com';
    $modules[$i]['version'] = '1.0.0';
    $modules[$i]['config'] = [];

    return;
}

class balance implements PaymentInterface
{
    public function __construct() {}

    public static function getModuleInfo(): array
    {
        return [
            'desc' => 'balance_desc',
            'is_cod' => '0',
            'is_online' => '1',
            'author' => 'ECSHOP TEAM',
            'website' => 'http://www.ecshop.com',
            'version' => '1.0.0',
            'config' => [],
        ];
    }

    public function get_code(array $order = [], array $payment = []): string
    {
        return '';
    }

    public function respond(): bool
    {
        return false;
    }
}

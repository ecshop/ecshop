<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

$shipping_lang = ROOT_PATH.'languages/'.$GLOBALS['_CFG']['lang'].'/shipping/fpd.php';
if (file_exists($shipping_lang)) {
    global $_LANG;
    include_once $shipping_lang;
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == true) {
    $i = (isset($modules)) ? count($modules) : 0;

    /* 配送方式插件的代码必须和文件名保持一致 */
    $modules[$i]['code'] = 'fpd';

    $modules[$i]['version'] = '1.0.0';

    /* 配送方式的描述 */
    $modules[$i]['desc'] = 'fpd_desc';

    /* 配送方式是否支持货到付款 */
    $modules[$i]['cod'] = false;

    /* 插件的作者 */
    $modules[$i]['author'] = 'ECSHOP TEAM';

    /* 插件作者的官方网站 */
    $modules[$i]['website'] = 'http://www.ecshop.com';

    /* 配送接口需要的参数 */
    $modules[$i]['configure'] = [];

    /* 模式编辑器 */
    $modules[$i]['print_model'] = 2;

    /* 打印单背景 */
    $modules[$i]['print_bg'] = '';

    /* 打印快递单标签位置信息 */
    $modules[$i]['config_lable'] = '';

    return;
}

class fpd
{
    /* ------------------------------------------------------ */
    // -- PUBLIC ATTRIBUTEs
    /* ------------------------------------------------------ */

    /**
     * 配置信息
     */
    public $configure;

    /* ------------------------------------------------------ */
    // -- PUBLIC METHODs
    /* ------------------------------------------------------ */

    /**
     * 构造函数
     *
     * @param: $configure[array]    配送方式的参数的数组
     *
     * @return null
     */
    public function __construct($cfg = []) {}

    /**
     * 计算订单的配送费用的函数
     *
     * @param  float  $goods_weight  商品重量
     * @param  float  $goods_amount  商品金额
     * @return decimal
     */
    public function calculate($goods_weight, $goods_amount)
    {
        return 0;
    }

    /**
     * 查询发货状态
     * 该配送方式不支持查询发货状态
     *
     * @param  string  $invoice_sn  发货单号
     * @return string
     */
    public function query($invoice_sn)
    {
        return $invoice_sn;
    }
}

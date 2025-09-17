<?php

declare(strict_types=1);

namespace app\bundles\shipping\model;

use think\Model;

class ShippingModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shipping';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'shipping_code',
        'shipping_name',
        'shipping_desc',
        'insure',
        'support_cod',
        'enabled',
        'shipping_print',
        'print_bg',
        'config_lable',
        'print_model',
        'shipping_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

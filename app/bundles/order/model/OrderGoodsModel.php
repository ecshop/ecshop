<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderGoodsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_goods';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'order_id',
        'goods_id',
        'goods_name',
        'goods_sn',
        'product_id',
        'goods_number',
        'market_price',
        'goods_price',
        'goods_attr',
        'send_number',
        'is_real',
        'extension_code',
        'parent_id',
        'is_gift',
        'goods_attr_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

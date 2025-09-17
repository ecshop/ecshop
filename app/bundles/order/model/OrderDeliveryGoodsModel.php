<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderDeliveryGoodsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_delivery_goods';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'delivery_id',
        'goods_id',
        'product_id',
        'product_sn',
        'goods_name',
        'brand_name',
        'goods_sn',
        'is_real',
        'extension_code',
        'parent_id',
        'send_number',
        'goods_attr',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

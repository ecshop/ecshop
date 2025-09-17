<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderBackGoodsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_back_goods';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'back_id',
        'goods_id',
        'product_id',
        'product_sn',
        'goods_name',
        'brand_name',
        'goods_sn',
        'is_real',
        'send_number',
        'goods_attr',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

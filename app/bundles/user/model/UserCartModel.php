<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserCartModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_cart';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'session_id',
        'goods_id',
        'goods_sn',
        'product_id',
        'goods_name',
        'market_price',
        'goods_price',
        'goods_number',
        'goods_attr',
        'is_real',
        'extension_code',
        'parent_id',
        'rec_type',
        'is_gift',
        'is_shipping',
        'can_handsel',
        'goods_attr_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

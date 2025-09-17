<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsVirtualCardModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_virtual_card';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'product_id',
        'card_sn',
        'card_password',
        'add_date',
        'end_date',
        'is_saled',
        'order_sn',
        'crc32',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

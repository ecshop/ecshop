<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsMemberPriceModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_member_price';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'product_id',
        'user_rank',
        'user_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

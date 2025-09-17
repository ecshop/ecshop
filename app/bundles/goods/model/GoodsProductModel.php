<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsProductModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_product';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'goods_attr',
        'product_sn',
        'product_number',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsAttrModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_attr';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'attr_id',
        'attr_value',
        'attr_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

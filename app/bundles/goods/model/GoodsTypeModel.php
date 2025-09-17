<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsTypeModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_type';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_name',
        'enabled',
        'attr_group',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsTypeAttributeModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_type_attribute';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_id',
        'attr_name',
        'attr_input_type',
        'attr_type',
        'attr_values',
        'attr_index',
        'sort_order',
        'is_linked',
        'attr_group',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

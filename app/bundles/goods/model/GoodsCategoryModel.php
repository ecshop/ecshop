<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsCategoryModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_category';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_name',
        'keywords',
        'cat_desc',
        'parent_id',
        'sort_order',
        'template_file',
        'measure_unit',
        'show_in_nav',
        'style',
        'is_show',
        'grade',
        'filter_attr',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

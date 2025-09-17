<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsBrandModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_brand';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'brand_name',
        'brand_logo',
        'brand_desc',
        'site_url',
        'sort_order',
        'is_show',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

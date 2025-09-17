<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopRegionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_region';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'parent_id',
        'region_name',
        'region_type',
        'agency_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

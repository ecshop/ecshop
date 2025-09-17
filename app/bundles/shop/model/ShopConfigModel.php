<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopConfigModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_config';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'parent_id',
        'code',
        'type',
        'store_range',
        'store_dir',
        'value',
        'sort_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

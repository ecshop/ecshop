<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityWholesaleModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_wholesale';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'product_id',
        'goods_name',
        'rank_ids',
        'prices',
        'enabled',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

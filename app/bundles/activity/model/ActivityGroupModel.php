<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityGroupModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_group';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'parent_id',
        'goods_id',
        'product_id',
        'goods_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

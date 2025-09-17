<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityPackageModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_package';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'package_id',
        'goods_id',
        'product_id',
        'goods_number',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivitySnatchModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_snatch';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'snatch_id',
        'user_id',
        'bid_price',
        'bid_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

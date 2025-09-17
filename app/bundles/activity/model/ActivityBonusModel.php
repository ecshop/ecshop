<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityBonusModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_bonus';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'type_name',
        'type_money',
        'send_type',
        'min_amount',
        'max_amount',
        'send_start_date',
        'send_end_date',
        'use_start_date',
        'use_end_date',
        'min_goods_amount',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'act_name',
        'start_time',
        'end_time',
        'user_rank',
        'act_range',
        'act_range_ext',
        'min_amount',
        'max_amount',
        'act_type',
        'act_type_ext',
        'gift',
        'sort_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

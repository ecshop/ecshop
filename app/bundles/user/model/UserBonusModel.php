<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserBonusModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_bonus';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'bonus_type_id',
        'bonus_sn',
        'user_id',
        'used_time',
        'order_id',
        'emailed',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

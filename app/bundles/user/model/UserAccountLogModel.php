<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserAccountLogModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_account_log';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'user_money',
        'frozen_money',
        'rank_points',
        'pay_points',
        'change_time',
        'change_desc',
        'change_type',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

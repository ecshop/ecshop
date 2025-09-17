<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserAccountModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_account';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'admin_user',
        'amount',
        'add_time',
        'paid_time',
        'admin_note',
        'user_note',
        'process_type',
        'payment',
        'is_paid',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

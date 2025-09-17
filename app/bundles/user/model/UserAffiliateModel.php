<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserAffiliateModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_affiliate';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'order_id',
        'time',
        'user_id',
        'user_name',
        'money',
        'point',
        'separate_type',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

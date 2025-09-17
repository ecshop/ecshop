<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'email',
        'user_name',
        'password',
        'question',
        'answer',
        'sex',
        'birthday',
        'user_money',
        'frozen_money',
        'pay_points',
        'rank_points',
        'address_id',
        'reg_time',
        'last_login',
        'last_time',
        'last_ip',
        'visit_count',
        'user_rank',
        'is_special',
        'ec_salt',
        'salt',
        'parent_id',
        'flag',
        'alias',
        'msn',
        'qq',
        'office_phone',
        'home_phone',
        'mobile_phone',
        'is_validated',
        'credit_line',
        'passwd_question',
        'passwd_answer',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

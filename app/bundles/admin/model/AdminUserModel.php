<?php

declare(strict_types=1);

namespace app\bundles\admin\model;

use think\Model;

class AdminUserModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'admin_user';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_name',
        'email',
        'password',
        'ec_salt',
        'add_time',
        'last_login',
        'last_ip',
        'action_list',
        'nav_list',
        'lang_type',
        'agency_id',
        'supplier_id',
        'todolist',
        'role_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\admin\model;

use think\Model;

class AdminRoleModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'admin_role';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'role_name',
        'action_list',
        'role_describe',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

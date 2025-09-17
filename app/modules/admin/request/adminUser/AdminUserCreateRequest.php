<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminUser;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminUserCreateRequest',
    required: [
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
    ],
    properties: [
        new OA\Property(property: 'id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'user_name', description: '用户名', type: 'string'),
        new OA\Property(property: 'email', description: '邮箱', type: 'string'),
        new OA\Property(property: 'password', description: '登录密码', type: 'string'),
        new OA\Property(property: 'ec_salt', description: '加密盐', type: 'string'),
        new OA\Property(property: 'add_time', description: '添加时间', type: 'integer'),
        new OA\Property(property: 'last_login', description: '最后登录时间', type: 'integer'),
        new OA\Property(property: 'last_ip', description: '最后登录IP', type: 'string'),
        new OA\Property(property: 'action_list', description: '操作权限列表', type: 'string'),
        new OA\Property(property: 'nav_list', description: '导航列表', type: 'string'),
        new OA\Property(property: 'lang_type', description: '语言类型', type: 'string'),
        new OA\Property(property: 'agency_id', description: '机构ID', type: 'integer'),
        new OA\Property(property: 'supplier_id', description: '供应商ID', type: 'integer'),
        new OA\Property(property: 'todolist', description: '待办事项', type: 'string'),
        new OA\Property(property: 'role_id', description: '角色ID', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdminUserCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_name' => 'require',
        'email' => 'require',
        'password' => 'require',
        'ec_salt' => 'require',
        'add_time' => 'require',
        'last_login' => 'require',
        'last_ip' => 'require',
        'action_list' => 'require',
        'nav_list' => 'require',
        'lang_type' => 'require',
        'agency_id' => 'require',
        'supplier_id' => 'require',
        'todolist' => 'require',
        'role_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置用户ID',
        'user_name.require' => '请设置用户名',
        'email.require' => '请设置邮箱',
        'password.require' => '请设置登录密码',
        'ec_salt.require' => '请设置加密盐',
        'add_time.require' => '请设置添加时间',
        'last_login.require' => '请设置最后登录时间',
        'last_ip.require' => '请设置最后登录IP',
        'action_list.require' => '请设置操作权限列表',
        'nav_list.require' => '请设置导航列表',
        'lang_type.require' => '请设置语言类型',
        'agency_id.require' => '请设置机构ID',
        'supplier_id.require' => '请设置供应商ID',
        'todolist.require' => '请设置待办事项',
        'role_id.require' => '请设置角色ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

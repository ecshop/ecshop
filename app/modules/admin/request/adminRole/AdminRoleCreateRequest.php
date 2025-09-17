<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminRole;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminRoleCreateRequest',
    required: [
        'id',
        'role_name',
        'action_list',
        'role_describe',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '角色ID', type: 'integer'),
        new OA\Property(property: 'role_name', description: '角色名称', type: 'string'),
        new OA\Property(property: 'action_list', description: '权限操作列表', type: 'string'),
        new OA\Property(property: 'role_describe', description: '角色描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdminRoleCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'role_name' => 'require',
        'action_list' => 'require',
        'role_describe' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置角色ID',
        'role_name.require' => '请设置角色名称',
        'action_list.require' => '请设置权限操作列表',
        'role_describe.require' => '请设置角色描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

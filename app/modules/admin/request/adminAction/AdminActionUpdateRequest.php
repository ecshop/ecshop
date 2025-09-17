<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminAction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminActionUpdateRequest',
    required: [
        'id',
        'parent_id',
        'action_code',
        'relevance',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '操作ID', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父操作ID', type: 'integer'),
        new OA\Property(property: 'action_code', description: '操作权限代码', type: 'string'),
        new OA\Property(property: 'relevance', description: '关联操作', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdminActionUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'parent_id' => 'require',
        'action_code' => 'require',
        'relevance' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置操作ID',
        'parent_id.require' => '请设置父操作ID',
        'action_code.require' => '请设置操作权限代码',
        'relevance.require' => '请设置关联操作',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

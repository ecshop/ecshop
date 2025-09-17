<?php

declare(strict_types=1);

namespace app\modules\admin\request\userExtendInfo;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserExtendInfoCreateRequest',
    required: [
        'id',
        'user_id',
        'reg_field_id',
        'content',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '关联用户ID', type: 'integer'),
        new OA\Property(property: 'reg_field_id', description: '注册扩展字段ID', type: 'integer'),
        new OA\Property(property: 'content', description: '扩展字段内容', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserExtendInfoCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'reg_field_id' => 'require',
        'content' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'user_id.require' => '请设置关联用户ID',
        'reg_field_id.require' => '请设置注册扩展字段ID',
        'content.require' => '请设置扩展字段内容',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

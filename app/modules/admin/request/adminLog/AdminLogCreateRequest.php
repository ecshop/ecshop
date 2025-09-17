<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminLogCreateRequest',
    required: [
        'id',
        'log_time',
        'user_id',
        'log_info',
        'ip_address',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'log_time', description: '日志时间', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'log_info', description: '日志信息', type: 'string'),
        new OA\Property(property: 'ip_address', description: 'IP地址', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdminLogCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'log_time' => 'require',
        'user_id' => 'require',
        'log_info' => 'require',
        'ip_address' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'log_time.require' => '请设置日志时间',
        'user_id.require' => '请设置用户ID',
        'log_info.require' => '请设置日志信息',
        'ip_address.require' => '请设置IP地址',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

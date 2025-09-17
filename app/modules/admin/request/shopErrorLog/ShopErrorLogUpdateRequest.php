<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopErrorLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopErrorLogUpdateRequest',
    required: [
        'id',
        'info',
        'file',
        'time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'info', description: '错误信息', type: 'string'),
        new OA\Property(property: 'file', description: '错误发生的文件', type: 'string'),
        new OA\Property(property: 'time', description: '错误发生时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopErrorLogUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'info' => 'require',
        'file' => 'require',
        'time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'info.require' => '请设置错误信息',
        'file.require' => '请设置错误发生的文件',
        'time.require' => '请设置错误发生时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

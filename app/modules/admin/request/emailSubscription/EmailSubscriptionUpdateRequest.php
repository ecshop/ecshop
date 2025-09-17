<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailSubscription;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailSubscriptionUpdateRequest',
    required: [
        'id',
        'email',
        'stat',
        'hash',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '记录ID', type: 'integer'),
        new OA\Property(property: 'email', description: '邮箱地址', type: 'string'),
        new OA\Property(property: 'stat', description: '状态(0未验证 1已验证)', type: 'integer'),
        new OA\Property(property: 'hash', description: '验证哈希值', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class EmailSubscriptionUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'email' => 'require',
        'stat' => 'require',
        'hash' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置记录ID',
        'email.require' => '请设置邮箱地址',
        'stat.require' => '请设置状态(0未验证 1已验证)',
        'hash.require' => '请设置验证哈希值',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

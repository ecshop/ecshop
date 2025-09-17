<?php

declare(strict_types=1);

namespace app\modules\admin\request\voteLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteLogUpdateRequest',
    required: [
        'id',
        'vote_id',
        'ip_address',
        'vote_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'vote_id', description: '关联投票ID', type: 'integer'),
        new OA\Property(property: 'ip_address', description: '投票IP地址', type: 'string'),
        new OA\Property(property: 'vote_time', description: '投票时间戳', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class VoteLogUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'vote_id' => 'require',
        'ip_address' => 'require',
        'vote_time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'vote_id.require' => '请设置关联投票ID',
        'ip_address.require' => '请设置投票IP地址',
        'vote_time.require' => '请设置投票时间戳',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\vote;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteUpdateRequest',
    required: [
        'id',
        'vote_name',
        'start_time',
        'end_time',
        'can_multi',
        'vote_count',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '投票ID', type: 'integer'),
        new OA\Property(property: 'vote_name', description: '投票名称', type: 'string'),
        new OA\Property(property: 'start_time', description: '开始时间戳', type: 'integer'),
        new OA\Property(property: 'end_time', description: '结束时间戳', type: 'integer'),
        new OA\Property(property: 'can_multi', description: '是否多选(0单选 1多选)', type: 'integer'),
        new OA\Property(property: 'vote_count', description: '投票总数', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class VoteUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'vote_name' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'can_multi' => 'require',
        'vote_count' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置投票ID',
        'vote_name.require' => '请设置投票名称',
        'start_time.require' => '请设置开始时间戳',
        'end_time.require' => '请设置结束时间戳',
        'can_multi.require' => '请设置是否多选(0单选 1多选)',
        'vote_count.require' => '请设置投票总数',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\voteOption;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteOptionUpdateRequest',
    required: [
        'id',
        'vote_id',
        'option_name',
        'option_count',
        'option_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '选项ID', type: 'integer'),
        new OA\Property(property: 'vote_id', description: '关联投票ID', type: 'integer'),
        new OA\Property(property: 'option_name', description: '选项名称', type: 'string'),
        new OA\Property(property: 'option_count', description: '投票计数', type: 'integer'),
        new OA\Property(property: 'option_order', description: '选项排序', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class VoteOptionUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'vote_id' => 'require',
        'option_name' => 'require',
        'option_count' => 'require',
        'option_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置选项ID',
        'vote_id.require' => '请设置关联投票ID',
        'option_name.require' => '请设置选项名称',
        'option_count.require' => '请设置投票计数',
        'option_order.require' => '请设置选项排序',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

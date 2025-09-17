<?php

declare(strict_types=1);

namespace app\modules\admin\request\activitySnatch;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivitySnatchCreateRequest',
    required: [
        'id',
        'snatch_id',
        'user_id',
        'bid_price',
        'bid_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'snatch_id', description: '抢购活动ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'bid_price', description: '出价金额', type: 'float'),
        new OA\Property(property: 'bid_time', description: '出价时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivitySnatchCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'snatch_id' => 'require',
        'user_id' => 'require',
        'bid_price' => 'require',
        'bid_time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'snatch_id.require' => '请设置抢购活动ID',
        'user_id.require' => '请设置用户ID',
        'bid_price.require' => '请设置出价金额',
        'bid_time.require' => '请设置出价时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

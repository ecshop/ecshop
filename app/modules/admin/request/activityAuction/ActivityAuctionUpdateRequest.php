<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityAuction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityAuctionUpdateRequest',
    required: [
        'id',
        'act_id',
        'bid_user',
        'bid_price',
        'bid_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '出价日志ID', type: 'integer'),
        new OA\Property(property: 'act_id', description: '拍卖活动ID', type: 'integer'),
        new OA\Property(property: 'bid_user', description: '出价用户ID', type: 'integer'),
        new OA\Property(property: 'bid_price', description: '出价金额', type: 'float'),
        new OA\Property(property: 'bid_time', description: '出价时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityAuctionUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'act_id' => 'require',
        'bid_user' => 'require',
        'bid_price' => 'require',
        'bid_time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置出价日志ID',
        'act_id.require' => '请设置拍卖活动ID',
        'bid_user.require' => '请设置出价用户ID',
        'bid_price.require' => '请设置出价金额',
        'bid_time.require' => '请设置出价时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

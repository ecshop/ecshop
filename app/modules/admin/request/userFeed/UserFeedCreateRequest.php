<?php

declare(strict_types=1);

namespace app\modules\admin\request\userFeed;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserFeedCreateRequest',
    required: [
        'id',
        'user_id',
        'value_id',
        'goods_id',
        'product_id',
        'feed_type',
        'is_feed',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '用户反馈ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'value_id', description: '关联值ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'feed_type', description: '反馈类型', type: 'integer'),
        new OA\Property(property: 'is_feed', description: '是否已反馈', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserFeedCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'value_id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'feed_type' => 'require',
        'is_feed' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置用户反馈ID',
        'user_id.require' => '请设置用户ID',
        'value_id.require' => '请设置关联值ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'feed_type.require' => '请设置反馈类型',
        'is_feed.require' => '请设置是否已反馈',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

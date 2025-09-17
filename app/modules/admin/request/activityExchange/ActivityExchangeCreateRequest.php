<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityExchange;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityExchangeCreateRequest',
    required: [
        'id',
        'goods_id',
        'product_id',
        'exchange_integral',
        'is_exchange',
        'is_hot',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'exchange_integral', description: '兑换所需积分', type: 'integer'),
        new OA\Property(property: 'is_exchange', description: '是否可兑换(0否 1是)', type: 'integer'),
        new OA\Property(property: 'is_hot', description: '是否热销(0否 1是)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityExchangeCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'exchange_integral' => 'require',
        'is_exchange' => 'require',
        'is_hot' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'exchange_integral.require' => '请设置兑换所需积分',
        'is_exchange.require' => '请设置是否可兑换(0否 1是)',
        'is_hot.require' => '请设置是否热销(0否 1是)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

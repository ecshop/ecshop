<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderPay;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderPayCreateRequest',
    required: [
        'id',
        'order_id',
        'order_amount',
        'order_type',
        'is_paid',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '支付日志ID', type: 'integer'),
        new OA\Property(property: 'order_id', description: '关联订单ID', type: 'integer'),
        new OA\Property(property: 'order_amount', description: '订单金额', type: 'float'),
        new OA\Property(property: 'order_type', description: '订单类型(0普通订单 1团购订单 2拍卖订单 3积分商城订单)', type: 'integer'),
        new OA\Property(property: 'is_paid', description: '是否已支付(0未支付 1已支付)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class OrderPayCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'order_id' => 'require',
        'order_amount' => 'require',
        'order_type' => 'require',
        'is_paid' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置支付日志ID',
        'order_id.require' => '请设置关联订单ID',
        'order_amount.require' => '请设置订单金额',
        'order_type.require' => '请设置订单类型(0普通订单 1团购订单 2拍卖订单 3积分商城订单)',
        'is_paid.require' => '请设置是否已支付(0未支付 1已支付)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

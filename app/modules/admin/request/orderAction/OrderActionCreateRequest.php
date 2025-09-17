<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderAction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderActionCreateRequest',
    required: [
        'id',
        'order_id',
        'action_user',
        'order_status',
        'shipping_status',
        'pay_status',
        'action_place',
        'action_note',
        'log_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '操作记录ID', type: 'integer'),
        new OA\Property(property: 'order_id', description: '订单ID', type: 'integer'),
        new OA\Property(property: 'action_user', description: '操作用户', type: 'string'),
        new OA\Property(property: 'order_status', description: '订单状态', type: 'integer'),
        new OA\Property(property: 'shipping_status', description: '配送状态', type: 'integer'),
        new OA\Property(property: 'pay_status', description: '支付状态', type: 'integer'),
        new OA\Property(property: 'action_place', description: '操作位置(0后台1前台)', type: 'integer'),
        new OA\Property(property: 'action_note', description: '操作备注', type: 'string'),
        new OA\Property(property: 'log_time', description: '记录时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class OrderActionCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'order_id' => 'require',
        'action_user' => 'require',
        'order_status' => 'require',
        'shipping_status' => 'require',
        'pay_status' => 'require',
        'action_place' => 'require',
        'action_note' => 'require',
        'log_time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置操作记录ID',
        'order_id.require' => '请设置订单ID',
        'action_user.require' => '请设置操作用户',
        'order_status.require' => '请设置订单状态',
        'shipping_status.require' => '请设置配送状态',
        'pay_status.require' => '请设置支付状态',
        'action_place.require' => '请设置操作位置(0后台1前台)',
        'action_note.require' => '请设置操作备注',
        'log_time.require' => '请设置记录时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

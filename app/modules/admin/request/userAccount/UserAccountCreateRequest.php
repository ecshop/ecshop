<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAccount;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAccountCreateRequest',
    required: [
        'id',
        'user_id',
        'admin_user',
        'amount',
        'add_time',
        'paid_time',
        'admin_note',
        'user_note',
        'process_type',
        'payment',
        'is_paid',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '记录ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'admin_user', description: '操作管理员', type: 'string'),
        new OA\Property(property: 'amount', description: '金额', type: 'float'),
        new OA\Property(property: 'add_time', description: '添加时间戳', type: 'integer'),
        new OA\Property(property: 'paid_time', description: '支付时间戳', type: 'integer'),
        new OA\Property(property: 'admin_note', description: '管理员备注', type: 'string'),
        new OA\Property(property: 'user_note', description: '用户备注', type: 'string'),
        new OA\Property(property: 'process_type', description: '处理类型(0充值 1提现)', type: 'integer'),
        new OA\Property(property: 'payment', description: '支付方式', type: 'string'),
        new OA\Property(property: 'is_paid', description: '是否已支付', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserAccountCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'admin_user' => 'require',
        'amount' => 'require',
        'add_time' => 'require',
        'paid_time' => 'require',
        'admin_note' => 'require',
        'user_note' => 'require',
        'process_type' => 'require',
        'payment' => 'require',
        'is_paid' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置记录ID',
        'user_id.require' => '请设置用户ID',
        'admin_user.require' => '请设置操作管理员',
        'amount.require' => '请设置金额',
        'add_time.require' => '请设置添加时间戳',
        'paid_time.require' => '请设置支付时间戳',
        'admin_note.require' => '请设置管理员备注',
        'user_note.require' => '请设置用户备注',
        'process_type.require' => '请设置处理类型(0充值 1提现)',
        'payment.require' => '请设置支付方式',
        'is_paid.require' => '请设置是否已支付',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

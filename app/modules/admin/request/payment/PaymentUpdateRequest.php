<?php

declare(strict_types=1);

namespace app\modules\admin\request\payment;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'PaymentUpdateRequest',
    required: [
        'id',
        'pay_code',
        'pay_name',
        'pay_fee',
        'pay_desc',
        'pay_order',
        'pay_config',
        'enabled',
        'is_cod',
        'is_online',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '支付方式ID', type: 'integer'),
        new OA\Property(property: 'pay_code', description: '支付代码', type: 'string'),
        new OA\Property(property: 'pay_name', description: '支付名称', type: 'string'),
        new OA\Property(property: 'pay_fee', description: '支付手续费', type: 'string'),
        new OA\Property(property: 'pay_desc', description: '支付描述', type: 'string'),
        new OA\Property(property: 'pay_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'pay_config', description: '支付配置', type: 'string'),
        new OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer'),
        new OA\Property(property: 'is_cod', description: '是否货到付款(0否 1是)', type: 'integer'),
        new OA\Property(property: 'is_online', description: '是否在线支付(0否 1是)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class PaymentUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'pay_code' => 'require',
        'pay_name' => 'require',
        'pay_fee' => 'require',
        'pay_desc' => 'require',
        'pay_order' => 'require',
        'pay_config' => 'require',
        'enabled' => 'require',
        'is_cod' => 'require',
        'is_online' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置支付方式ID',
        'pay_code.require' => '请设置支付代码',
        'pay_name.require' => '请设置支付名称',
        'pay_fee.require' => '请设置支付手续费',
        'pay_desc.require' => '请设置支付描述',
        'pay_order.require' => '请设置排序权重',
        'pay_config.require' => '请设置支付配置',
        'enabled.require' => '请设置是否启用(0禁用 1启用)',
        'is_cod.require' => '请设置是否货到付款(0否 1是)',
        'is_online.require' => '请设置是否在线支付(0否 1是)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

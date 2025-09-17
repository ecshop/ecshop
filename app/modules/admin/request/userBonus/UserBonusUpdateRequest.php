<?php

declare(strict_types=1);

namespace app\modules\admin\request\userBonus;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserBonusUpdateRequest',
    required: [
        'id',
        'bonus_type_id',
        'bonus_sn',
        'user_id',
        'used_time',
        'order_id',
        'emailed',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '优惠券ID', type: 'integer'),
        new OA\Property(property: 'bonus_type_id', description: '优惠券类型ID', type: 'integer'),
        new OA\Property(property: 'bonus_sn', description: '优惠券序列号', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'used_time', description: '使用时间戳', type: 'integer'),
        new OA\Property(property: 'order_id', description: '订单ID', type: 'integer'),
        new OA\Property(property: 'emailed', description: '是否已邮件通知', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserBonusUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'bonus_type_id' => 'require',
        'bonus_sn' => 'require',
        'user_id' => 'require',
        'used_time' => 'require',
        'order_id' => 'require',
        'emailed' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置优惠券ID',
        'bonus_type_id.require' => '请设置优惠券类型ID',
        'bonus_sn.require' => '请设置优惠券序列号',
        'user_id.require' => '请设置用户ID',
        'used_time.require' => '请设置使用时间戳',
        'order_id.require' => '请设置订单ID',
        'emailed.require' => '请设置是否已邮件通知',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

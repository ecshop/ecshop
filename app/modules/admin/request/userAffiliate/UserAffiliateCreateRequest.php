<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAffiliate;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAffiliateCreateRequest',
    required: [
        'id',
        'order_id',
        'time',
        'user_id',
        'user_name',
        'money',
        'point',
        'separate_type',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'order_id', description: '订单ID', type: 'integer'),
        new OA\Property(property: 'time', description: '时间', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'user_name', description: '用户名', type: 'string'),
        new OA\Property(property: 'money', description: '金额', type: 'float'),
        new OA\Property(property: 'point', description: '积分', type: 'integer'),
        new OA\Property(property: 'separate_type', description: '分佣类型', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserAffiliateCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'order_id' => 'require',
        'time' => 'require',
        'user_id' => 'require',
        'user_name' => 'require',
        'money' => 'require',
        'point' => 'require',
        'separate_type' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'order_id.require' => '请设置订单ID',
        'time.require' => '请设置时间',
        'user_id.require' => '请设置用户ID',
        'user_name.require' => '请设置用户名',
        'money.require' => '请设置金额',
        'point.require' => '请设置积分',
        'separate_type.require' => '请设置分佣类型',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

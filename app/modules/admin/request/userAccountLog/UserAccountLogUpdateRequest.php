<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAccountLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAccountLogUpdateRequest',
    required: [
        'id',
        'user_id',
        'user_money',
        'frozen_money',
        'rank_points',
        'pay_points',
        'change_time',
        'change_desc',
        'change_type',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '日志ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'user_money', description: '用户资金变动', type: 'float'),
        new OA\Property(property: 'frozen_money', description: '冻结资金变动', type: 'float'),
        new OA\Property(property: 'rank_points', description: '等级积分变动', type: 'integer'),
        new OA\Property(property: 'pay_points', description: '消费积分变动', type: 'integer'),
        new OA\Property(property: 'change_time', description: '变动时间', type: 'integer'),
        new OA\Property(property: 'change_desc', description: '变动描述', type: 'string'),
        new OA\Property(property: 'change_type', description: '变动类型', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserAccountLogUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'user_money' => 'require',
        'frozen_money' => 'require',
        'rank_points' => 'require',
        'pay_points' => 'require',
        'change_time' => 'require',
        'change_desc' => 'require',
        'change_type' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置日志ID',
        'user_id.require' => '请设置用户ID',
        'user_money.require' => '请设置用户资金变动',
        'frozen_money.require' => '请设置冻结资金变动',
        'rank_points.require' => '请设置等级积分变动',
        'pay_points.require' => '请设置消费积分变动',
        'change_time.require' => '请设置变动时间',
        'change_desc.require' => '请设置变动描述',
        'change_type.require' => '请设置变动类型',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

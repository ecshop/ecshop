<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityBonus;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityBonusUpdateRequest',
    required: [
        'id',
        'type_name',
        'type_money',
        'send_type',
        'min_amount',
        'max_amount',
        'send_start_date',
        'send_end_date',
        'use_start_date',
        'use_end_date',
        'min_goods_amount',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '红包类型ID', type: 'integer'),
        new OA\Property(property: 'type_name', description: '红包类型名称', type: 'string'),
        new OA\Property(property: 'type_money', description: '红包金额', type: 'float'),
        new OA\Property(property: 'send_type', description: '发放方式（0手动 1自动）', type: 'integer'),
        new OA\Property(property: 'min_amount', description: '最小订单金额', type: 'float'),
        new OA\Property(property: 'max_amount', description: '最大订单金额', type: 'float'),
        new OA\Property(property: 'send_start_date', description: '发放开始时间戳', type: 'integer'),
        new OA\Property(property: 'send_end_date', description: '发放结束时间戳', type: 'integer'),
        new OA\Property(property: 'use_start_date', description: '使用开始时间戳', type: 'integer'),
        new OA\Property(property: 'use_end_date', description: '使用结束时间戳', type: 'integer'),
        new OA\Property(property: 'min_goods_amount', description: '最小商品金额限制', type: 'float'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityBonusUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'type_name' => 'require',
        'type_money' => 'require',
        'send_type' => 'require',
        'min_amount' => 'require',
        'max_amount' => 'require',
        'send_start_date' => 'require',
        'send_end_date' => 'require',
        'use_start_date' => 'require',
        'use_end_date' => 'require',
        'min_goods_amount' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置红包类型ID',
        'type_name.require' => '请设置红包类型名称',
        'type_money.require' => '请设置红包金额',
        'send_type.require' => '请设置发放方式（0手动 1自动）',
        'min_amount.require' => '请设置最小订单金额',
        'max_amount.require' => '请设置最大订单金额',
        'send_start_date.require' => '请设置发放开始时间戳',
        'send_end_date.require' => '请设置发放结束时间戳',
        'use_start_date.require' => '请设置使用开始时间戳',
        'use_end_date.require' => '请设置使用结束时间戳',
        'min_goods_amount.require' => '请设置最小商品金额限制',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

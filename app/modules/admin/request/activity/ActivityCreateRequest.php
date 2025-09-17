<?php

declare(strict_types=1);

namespace app\modules\admin\request\activity;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityCreateRequest',
    required: [
        'id',
        'act_name',
        'start_time',
        'end_time',
        'user_rank',
        'act_range',
        'act_range_ext',
        'min_amount',
        'max_amount',
        'act_type',
        'act_type_ext',
        'gift',
        'sort_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '活动ID', type: 'integer'),
        new OA\Property(property: 'act_name', description: '活动名称', type: 'string'),
        new OA\Property(property: 'start_time', description: '开始时间', type: 'integer'),
        new OA\Property(property: 'end_time', description: '结束时间', type: 'integer'),
        new OA\Property(property: 'user_rank', description: '适用会员等级', type: 'string'),
        new OA\Property(property: 'act_range', description: '活动范围(0全部商品 1指定分类 2指定品牌 3指定商品)', type: 'integer'),
        new OA\Property(property: 'act_range_ext', description: '活动范围扩展(根据act_range存储不同数据)', type: 'string'),
        new OA\Property(property: 'min_amount', description: '最小金额限制', type: 'float'),
        new OA\Property(property: 'max_amount', description: '最大金额限制', type: 'float'),
        new OA\Property(property: 'act_type', description: '活动类型(0赠品 1减免 2折扣 3现金)', type: 'integer'),
        new OA\Property(property: 'act_type_ext', description: '活动类型扩展值(折扣率/减免金额等)', type: 'float'),
        new OA\Property(property: 'gift', description: '赠品信息(JSON格式)', type: 'string'),
        new OA\Property(property: 'sort_order', description: '排序', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'act_name' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'user_rank' => 'require',
        'act_range' => 'require',
        'act_range_ext' => 'require',
        'min_amount' => 'require',
        'max_amount' => 'require',
        'act_type' => 'require',
        'act_type_ext' => 'require',
        'gift' => 'require',
        'sort_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置活动ID',
        'act_name.require' => '请设置活动名称',
        'start_time.require' => '请设置开始时间',
        'end_time.require' => '请设置结束时间',
        'user_rank.require' => '请设置适用会员等级',
        'act_range.require' => '请设置活动范围(0全部商品 1指定分类 2指定品牌 3指定商品)',
        'act_range_ext.require' => '请设置活动范围扩展(根据act_range存储不同数据)',
        'min_amount.require' => '请设置最小金额限制',
        'max_amount.require' => '请设置最大金额限制',
        'act_type.require' => '请设置活动类型(0赠品 1减免 2折扣 3现金)',
        'act_type_ext.require' => '请设置活动类型扩展值(折扣率/减免金额等)',
        'gift.require' => '请设置赠品信息(JSON格式)',
        'sort_order.require' => '请设置排序',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

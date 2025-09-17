<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsActivity;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsActivityCreateRequest',
    required: [
        'id',
        'act_name',
        'act_desc',
        'act_type',
        'goods_id',
        'product_id',
        'goods_name',
        'start_time',
        'end_time',
        'is_finished',
        'ext_info',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '活动ID', type: 'integer'),
        new OA\Property(property: 'act_name', description: '活动名称', type: 'string'),
        new OA\Property(property: 'act_desc', description: '活动描述', type: 'string'),
        new OA\Property(property: 'act_type', description: '活动类型(0团购 1抢购 2拍卖 3优惠)', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_name', description: '商品名称', type: 'string'),
        new OA\Property(property: 'start_time', description: '开始时间', type: 'integer'),
        new OA\Property(property: 'end_time', description: '结束时间', type: 'integer'),
        new OA\Property(property: 'is_finished', description: '是否结束(1是 0否)', type: 'integer'),
        new OA\Property(property: 'ext_info', description: '扩展信息(JSON格式)', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsActivityCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'act_name' => 'require',
        'act_desc' => 'require',
        'act_type' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'goods_name' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'is_finished' => 'require',
        'ext_info' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置活动ID',
        'act_name.require' => '请设置活动名称',
        'act_desc.require' => '请设置活动描述',
        'act_type.require' => '请设置活动类型(0团购 1抢购 2拍卖 3优惠)',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'goods_name.require' => '请设置商品名称',
        'start_time.require' => '请设置开始时间',
        'end_time.require' => '请设置结束时间',
        'is_finished.require' => '请设置是否结束(1是 0否)',
        'ext_info.require' => '请设置扩展信息(JSON格式)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

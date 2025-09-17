<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityGroup;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityGroupCreateRequest',
    required: [
        'id',
        'parent_id',
        'goods_id',
        'product_id',
        'goods_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '主商品ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '关联货品ID', type: 'integer'),
        new OA\Property(property: 'goods_price', description: '商品价格', type: 'float'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityGroupCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'parent_id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'goods_price' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'parent_id.require' => '请设置主商品ID',
        'goods_id.require' => '请设置关联商品ID',
        'product_id.require' => '请设置关联货品ID',
        'goods_price.require' => '请设置商品价格',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

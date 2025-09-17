<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsProduct;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsProductCreateRequest',
    required: [
        'id',
        'goods_id',
        'goods_attr',
        'product_sn',
        'product_number',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer'),
        new OA\Property(property: 'goods_attr', description: '商品属性组合', type: 'string'),
        new OA\Property(property: 'product_sn', description: '货品编号', type: 'string'),
        new OA\Property(property: 'product_number', description: '货品库存数量', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsProductCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'goods_attr' => 'require',
        'product_sn' => 'require',
        'product_number' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置货品ID',
        'goods_id.require' => '请设置关联商品ID',
        'goods_attr.require' => '请设置商品属性组合',
        'product_sn.require' => '请设置货品编号',
        'product_number.require' => '请设置货品库存数量',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

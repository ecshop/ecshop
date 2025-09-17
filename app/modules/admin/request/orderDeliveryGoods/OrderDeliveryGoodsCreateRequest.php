<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderDeliveryGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderDeliveryGoodsCreateRequest',
    required: [
        'id',
        'delivery_id',
        'goods_id',
        'product_id',
        'product_sn',
        'goods_name',
        'brand_name',
        'goods_sn',
        'is_real',
        'extension_code',
        'parent_id',
        'send_number',
        'goods_attr',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '记录ID', type: 'integer'),
        new OA\Property(property: 'delivery_id', description: '发货单ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'product_sn', description: '货品编号', type: 'string'),
        new OA\Property(property: 'goods_name', description: '商品名称', type: 'string'),
        new OA\Property(property: 'brand_name', description: '品牌名称', type: 'string'),
        new OA\Property(property: 'goods_sn', description: '商品编号', type: 'string'),
        new OA\Property(property: 'is_real', description: '是否实物商品', type: 'integer'),
        new OA\Property(property: 'extension_code', description: '扩展代码', type: 'string'),
        new OA\Property(property: 'parent_id', description: '父商品ID', type: 'integer'),
        new OA\Property(property: 'send_number', description: '发货数量', type: 'integer'),
        new OA\Property(property: 'goods_attr', description: '商品属性', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class OrderDeliveryGoodsCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'delivery_id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'product_sn' => 'require',
        'goods_name' => 'require',
        'brand_name' => 'require',
        'goods_sn' => 'require',
        'is_real' => 'require',
        'extension_code' => 'require',
        'parent_id' => 'require',
        'send_number' => 'require',
        'goods_attr' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置记录ID',
        'delivery_id.require' => '请设置发货单ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'product_sn.require' => '请设置货品编号',
        'goods_name.require' => '请设置商品名称',
        'brand_name.require' => '请设置品牌名称',
        'goods_sn.require' => '请设置商品编号',
        'is_real.require' => '请设置是否实物商品',
        'extension_code.require' => '请设置扩展代码',
        'parent_id.require' => '请设置父商品ID',
        'send_number.require' => '请设置发货数量',
        'goods_attr.require' => '请设置商品属性',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

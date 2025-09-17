<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderGoodsUpdateRequest',
    required: [
        'id',
        'order_id',
        'goods_id',
        'goods_name',
        'goods_sn',
        'product_id',
        'goods_number',
        'market_price',
        'goods_price',
        'goods_attr',
        'send_number',
        'is_real',
        'extension_code',
        'parent_id',
        'is_gift',
        'goods_attr_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '记录ID', type: 'integer'),
        new OA\Property(property: 'order_id', description: '订单ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'goods_name', description: '商品名称', type: 'string'),
        new OA\Property(property: 'goods_sn', description: '商品编号', type: 'string'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_number', description: '商品数量', type: 'integer'),
        new OA\Property(property: 'market_price', description: '市场价', type: 'float'),
        new OA\Property(property: 'goods_price', description: '商品价格', type: 'float'),
        new OA\Property(property: 'goods_attr', description: '商品属性', type: 'string'),
        new OA\Property(property: 'send_number', description: '发货数量', type: 'integer'),
        new OA\Property(property: 'is_real', description: '是否实物(0否1是)', type: 'integer'),
        new OA\Property(property: 'extension_code', description: '扩展代码', type: 'string'),
        new OA\Property(property: 'parent_id', description: '父商品ID', type: 'integer'),
        new OA\Property(property: 'is_gift', description: '是否赠品(0否1是)', type: 'integer'),
        new OA\Property(property: 'goods_attr_id', description: '商品属性ID', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class OrderGoodsUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'order_id' => 'require',
        'goods_id' => 'require',
        'goods_name' => 'require',
        'goods_sn' => 'require',
        'product_id' => 'require',
        'goods_number' => 'require',
        'market_price' => 'require',
        'goods_price' => 'require',
        'goods_attr' => 'require',
        'send_number' => 'require',
        'is_real' => 'require',
        'extension_code' => 'require',
        'parent_id' => 'require',
        'is_gift' => 'require',
        'goods_attr_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置记录ID',
        'order_id.require' => '请设置订单ID',
        'goods_id.require' => '请设置商品ID',
        'goods_name.require' => '请设置商品名称',
        'goods_sn.require' => '请设置商品编号',
        'product_id.require' => '请设置货品ID',
        'goods_number.require' => '请设置商品数量',
        'market_price.require' => '请设置市场价',
        'goods_price.require' => '请设置商品价格',
        'goods_attr.require' => '请设置商品属性',
        'send_number.require' => '请设置发货数量',
        'is_real.require' => '请设置是否实物(0否1是)',
        'extension_code.require' => '请设置扩展代码',
        'parent_id.require' => '请设置父商品ID',
        'is_gift.require' => '请设置是否赠品(0否1是)',
        'goods_attr_id.require' => '请设置商品属性ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

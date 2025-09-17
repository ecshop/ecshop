<?php

declare(strict_types=1);

namespace app\modules\admin\request\userCart;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserCartUpdateRequest',
    required: [
        'id',
        'user_id',
        'session_id',
        'goods_id',
        'goods_sn',
        'product_id',
        'goods_name',
        'market_price',
        'goods_price',
        'goods_number',
        'goods_attr',
        'is_real',
        'extension_code',
        'parent_id',
        'rec_type',
        'is_gift',
        'is_shipping',
        'can_handsel',
        'goods_attr_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '购物车记录ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'session_id', description: '会话ID', type: 'string'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'goods_sn', description: '商品货号', type: 'string'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_name', description: '商品名称', type: 'string'),
        new OA\Property(property: 'market_price', description: '市场价', type: 'float'),
        new OA\Property(property: 'goods_price', description: '商品价格', type: 'float'),
        new OA\Property(property: 'goods_number', description: '购买数量', type: 'integer'),
        new OA\Property(property: 'goods_attr', description: '商品属性', type: 'string'),
        new OA\Property(property: 'is_real', description: '是否实物', type: 'integer'),
        new OA\Property(property: 'extension_code', description: '扩展代码', type: 'string'),
        new OA\Property(property: 'parent_id', description: '父商品ID', type: 'integer'),
        new OA\Property(property: 'rec_type', description: '记录类型', type: 'integer'),
        new OA\Property(property: 'is_gift', description: '是否赠品', type: 'integer'),
        new OA\Property(property: 'is_shipping', description: '是否需要配送', type: 'integer'),
        new OA\Property(property: 'can_handsel', description: '能否处理', type: 'integer'),
        new OA\Property(property: 'goods_attr_id', description: '商品属性ID', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserCartUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'session_id' => 'require',
        'goods_id' => 'require',
        'goods_sn' => 'require',
        'product_id' => 'require',
        'goods_name' => 'require',
        'market_price' => 'require',
        'goods_price' => 'require',
        'goods_number' => 'require',
        'goods_attr' => 'require',
        'is_real' => 'require',
        'extension_code' => 'require',
        'parent_id' => 'require',
        'rec_type' => 'require',
        'is_gift' => 'require',
        'is_shipping' => 'require',
        'can_handsel' => 'require',
        'goods_attr_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置购物车记录ID',
        'user_id.require' => '请设置用户ID',
        'session_id.require' => '请设置会话ID',
        'goods_id.require' => '请设置商品ID',
        'goods_sn.require' => '请设置商品货号',
        'product_id.require' => '请设置货品ID',
        'goods_name.require' => '请设置商品名称',
        'market_price.require' => '请设置市场价',
        'goods_price.require' => '请设置商品价格',
        'goods_number.require' => '请设置购买数量',
        'goods_attr.require' => '请设置商品属性',
        'is_real.require' => '请设置是否实物',
        'extension_code.require' => '请设置扩展代码',
        'parent_id.require' => '请设置父商品ID',
        'rec_type.require' => '请设置记录类型',
        'is_gift.require' => '请设置是否赠品',
        'is_shipping.require' => '请设置是否需要配送',
        'can_handsel.require' => '请设置能否处理',
        'goods_attr_id.require' => '请设置商品属性ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsAttr;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsAttrUpdateRequest',
    required: [
        'id',
        'goods_id',
        'attr_id',
        'attr_value',
        'attr_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '商品属性关联ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'attr_id', description: '属性ID', type: 'integer'),
        new OA\Property(property: 'attr_value', description: '属性值', type: 'string'),
        new OA\Property(property: 'attr_price', description: '属性价格', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsAttrUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'attr_id' => 'require',
        'attr_value' => 'require',
        'attr_price' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置商品属性关联ID',
        'goods_id.require' => '请设置商品ID',
        'attr_id.require' => '请设置属性ID',
        'attr_value.require' => '请设置属性值',
        'attr_price.require' => '请设置属性价格',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

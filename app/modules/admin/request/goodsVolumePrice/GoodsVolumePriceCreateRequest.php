<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsVolumePrice;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsVolumePriceCreateRequest',
    required: [
        'id',
        'price_type',
        'goods_id',
        'product_id',
        'volume_number',
        'volume_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'price_type', description: '价格类型(1会员价 2批发价)', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'volume_number', description: '购买数量', type: 'integer'),
        new OA\Property(property: 'volume_price', description: '阶梯价格', type: 'float'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsVolumePriceCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'price_type' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'volume_number' => 'require',
        'volume_price' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'price_type.require' => '请设置价格类型(1会员价 2批发价)',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'volume_number.require' => '请设置购买数量',
        'volume_price.require' => '请设置阶梯价格',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsLinkGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsLinkGoodsCreateRequest',
    required: [
        'id',
        'goods_id',
        'link_goods_id',
        'is_double',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '主商品ID', type: 'integer'),
        new OA\Property(property: 'link_goods_id', description: '关联商品ID', type: 'integer'),
        new OA\Property(property: 'is_double', description: '是否双向关联(0否1是)', type: 'integer'),
    ]
)]
class GoodsLinkGoodsCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'link_goods_id' => 'require',
        'is_double' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'goods_id.require' => '请设置主商品ID',
        'link_goods_id.require' => '请设置关联商品ID',
        'is_double.require' => '请设置是否双向关联(0否1是)',
    ];
}

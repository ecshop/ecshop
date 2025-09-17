<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCat;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCatCreateRequest',
    required: [
        'id',
        'goods_id',
        'cat_id',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'cat_id', description: '分类ID', type: 'integer'),
    ]
)]
class GoodsCatCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'cat_id' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'goods_id.require' => '请设置商品ID',
        'cat_id.require' => '请设置分类ID',
    ];
}

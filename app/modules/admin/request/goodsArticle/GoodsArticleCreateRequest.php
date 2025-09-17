<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsArticle;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsArticleCreateRequest',
    required: [
        'id',
        'goods_id',
        'article_id',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'article_id', description: '关联文章ID', type: 'integer'),
    ]
)]
class GoodsArticleCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'article_id' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'goods_id.require' => '请设置商品ID',
        'article_id.require' => '请设置关联文章ID',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCatRecommend;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCatRecommendCreateRequest',
    required: [
        'id',
        'cat_id',
        'recommend_type',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'cat_id', description: '分类ID', type: 'integer'),
        new OA\Property(property: 'recommend_type', description: '推荐类型(1精品 2新品 3热销)', type: 'integer'),
    ]
)]
class GoodsCatRecommendCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_id' => 'require',
        'recommend_type' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'cat_id.require' => '请设置分类ID',
        'recommend_type.require' => '请设置推荐类型(1精品 2新品 3热销)',
    ];
}

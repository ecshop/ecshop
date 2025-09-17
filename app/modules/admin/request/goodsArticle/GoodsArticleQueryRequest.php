<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsArticle;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsArticleQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsArticleQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

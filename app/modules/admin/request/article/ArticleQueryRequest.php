<?php

declare(strict_types=1);

namespace app\modules\admin\request\article;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ArticleQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ArticleQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

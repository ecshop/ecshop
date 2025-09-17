<?php

declare(strict_types=1);

namespace app\modules\admin\request\articleCat;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ArticleCatQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ArticleCatQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

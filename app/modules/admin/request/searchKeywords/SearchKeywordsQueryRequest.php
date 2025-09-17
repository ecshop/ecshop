<?php

declare(strict_types=1);

namespace app\modules\admin\request\searchKeywords;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'SearchKeywordsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class SearchKeywordsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

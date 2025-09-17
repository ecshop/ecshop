<?php

declare(strict_types=1);

namespace app\modules\admin\request\searchEngine;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'SearchEngineQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class SearchEngineQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

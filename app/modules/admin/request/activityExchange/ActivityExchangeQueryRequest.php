<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityExchange;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityExchangeQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityExchangeQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailSubscription;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailSubscriptionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class EmailSubscriptionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

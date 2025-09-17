<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityWholesale;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityWholesaleQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityWholesaleQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityGroup;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityGroupQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityGroupQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

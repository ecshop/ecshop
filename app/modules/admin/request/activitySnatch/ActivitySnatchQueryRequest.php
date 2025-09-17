<?php

declare(strict_types=1);

namespace app\modules\admin\request\activitySnatch;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivitySnatchQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivitySnatchQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

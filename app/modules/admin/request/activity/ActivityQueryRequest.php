<?php

declare(strict_types=1);

namespace app\modules\admin\request\activity;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

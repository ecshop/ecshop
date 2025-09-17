<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityPackage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityPackageQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityPackageQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

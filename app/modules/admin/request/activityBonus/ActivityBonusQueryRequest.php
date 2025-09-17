<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityBonus;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityBonusQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityBonusQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

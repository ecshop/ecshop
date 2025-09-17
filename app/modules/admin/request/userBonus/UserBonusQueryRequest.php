<?php

declare(strict_types=1);

namespace app\modules\admin\request\userBonus;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserBonusQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserBonusQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

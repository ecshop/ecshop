<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAccountLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAccountLogQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserAccountLogQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

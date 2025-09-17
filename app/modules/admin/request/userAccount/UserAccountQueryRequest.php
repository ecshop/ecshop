<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAccount;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAccountQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserAccountQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

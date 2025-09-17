<?php

declare(strict_types=1);

namespace app\modules\admin\request\user;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

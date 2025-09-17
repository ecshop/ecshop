<?php

declare(strict_types=1);

namespace app\modules\admin\request\userCart;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserCartQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserCartQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

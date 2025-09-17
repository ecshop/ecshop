<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAddress;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAddressQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserAddressQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

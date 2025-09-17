<?php

declare(strict_types=1);

namespace app\modules\admin\request\userExtendInfo;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserExtendInfoQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserExtendInfoQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

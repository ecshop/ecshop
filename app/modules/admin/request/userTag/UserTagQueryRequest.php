<?php

declare(strict_types=1);

namespace app\modules\admin\request\userTag;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserTagQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserTagQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

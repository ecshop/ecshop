<?php

declare(strict_types=1);

namespace app\modules\admin\request\userFeed;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserFeedQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserFeedQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

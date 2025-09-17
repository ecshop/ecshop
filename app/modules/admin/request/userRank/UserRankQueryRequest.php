<?php

declare(strict_types=1);

namespace app\modules\admin\request\userRank;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserRankQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserRankQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

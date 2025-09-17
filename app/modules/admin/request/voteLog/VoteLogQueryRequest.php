<?php

declare(strict_types=1);

namespace app\modules\admin\request\voteLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteLogQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class VoteLogQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\voteOption;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteOptionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class VoteOptionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

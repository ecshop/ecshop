<?php

declare(strict_types=1);

namespace app\modules\admin\request\vote;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'VoteQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class VoteQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

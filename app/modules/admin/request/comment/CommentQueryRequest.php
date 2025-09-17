<?php

declare(strict_types=1);

namespace app\modules\admin\request\comment;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'CommentQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class CommentQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

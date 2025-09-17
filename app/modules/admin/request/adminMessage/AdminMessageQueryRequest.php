<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminMessage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminMessageQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdminMessageQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

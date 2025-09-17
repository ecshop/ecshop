<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminLogQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdminLogQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

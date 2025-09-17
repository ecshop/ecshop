<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderInfo;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderInfoQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderInfoQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

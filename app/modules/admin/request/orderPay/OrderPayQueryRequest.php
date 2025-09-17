<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderPay;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderPayQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderPayQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

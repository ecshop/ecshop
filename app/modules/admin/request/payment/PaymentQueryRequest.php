<?php

declare(strict_types=1);

namespace app\modules\admin\request\payment;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'PaymentQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class PaymentQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

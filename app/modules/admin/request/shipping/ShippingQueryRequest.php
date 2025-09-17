<?php

declare(strict_types=1);

namespace app\modules\admin\request\shipping;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShippingQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

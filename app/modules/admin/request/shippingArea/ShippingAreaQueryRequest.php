<?php

declare(strict_types=1);

namespace app\modules\admin\request\shippingArea;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingAreaQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShippingAreaQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

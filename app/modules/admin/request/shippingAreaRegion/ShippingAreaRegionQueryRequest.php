<?php

declare(strict_types=1);

namespace app\modules\admin\request\shippingAreaRegion;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingAreaRegionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShippingAreaRegionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderDeliveryOrder;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderDeliveryOrderQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderDeliveryOrderQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

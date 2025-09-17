<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderDeliveryGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderDeliveryGoodsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderDeliveryGoodsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

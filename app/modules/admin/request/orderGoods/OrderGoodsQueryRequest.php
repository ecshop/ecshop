<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderGoodsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderGoodsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

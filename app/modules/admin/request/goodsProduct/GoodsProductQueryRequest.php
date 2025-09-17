<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsProduct;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsProductQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsProductQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

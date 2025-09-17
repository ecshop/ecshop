<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsActivity;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsActivityQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsActivityQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsType;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsTypeQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsTypeQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

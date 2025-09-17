<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsTypeAttribute;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsTypeAttributeQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsTypeAttributeQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

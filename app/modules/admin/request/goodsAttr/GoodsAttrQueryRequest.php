<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsAttr;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsAttrQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsAttrQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

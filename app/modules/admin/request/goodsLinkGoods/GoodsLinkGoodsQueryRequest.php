<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsLinkGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsLinkGoodsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsLinkGoodsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

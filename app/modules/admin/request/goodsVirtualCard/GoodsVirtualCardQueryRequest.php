<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsVirtualCard;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsVirtualCardQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsVirtualCardQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

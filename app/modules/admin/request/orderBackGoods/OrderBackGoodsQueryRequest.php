<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderBackGoods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderBackGoodsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderBackGoodsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

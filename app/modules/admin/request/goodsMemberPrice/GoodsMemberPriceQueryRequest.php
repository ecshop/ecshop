<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsMemberPrice;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsMemberPriceQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsMemberPriceQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopErrorLog;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopErrorLogQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopErrorLogQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

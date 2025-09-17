<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopConfig;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopConfigQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopConfigQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

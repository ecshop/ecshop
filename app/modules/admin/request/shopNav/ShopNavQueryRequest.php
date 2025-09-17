<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopNav;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopNavQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopNavQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

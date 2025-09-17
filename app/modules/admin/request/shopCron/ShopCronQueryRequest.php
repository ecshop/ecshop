<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopCron;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopCronQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopCronQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopCard;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopCardQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopCardQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

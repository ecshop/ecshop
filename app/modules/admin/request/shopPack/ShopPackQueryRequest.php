<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopPack;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopPackQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopPackQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

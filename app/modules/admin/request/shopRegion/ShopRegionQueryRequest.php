<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopRegion;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopRegionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopRegionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

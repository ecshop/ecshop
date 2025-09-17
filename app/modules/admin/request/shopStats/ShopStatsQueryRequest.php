<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopStats;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopStatsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopStatsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

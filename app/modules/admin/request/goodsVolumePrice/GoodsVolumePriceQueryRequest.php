<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsVolumePrice;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsVolumePriceQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsVolumePriceQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

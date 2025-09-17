<?php

declare(strict_types=1);

namespace app\modules\admin\request\goods;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

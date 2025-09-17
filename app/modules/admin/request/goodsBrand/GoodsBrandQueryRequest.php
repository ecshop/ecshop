<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsBrand;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsBrandQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsBrandQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

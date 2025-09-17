<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCategory;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCategoryQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsCategoryQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

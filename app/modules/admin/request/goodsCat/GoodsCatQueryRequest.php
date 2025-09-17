<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCat;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCatQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsCatQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

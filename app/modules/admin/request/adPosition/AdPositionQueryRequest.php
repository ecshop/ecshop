<?php

declare(strict_types=1);

namespace app\modules\admin\request\adPosition;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdPositionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdPositionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderAction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderActionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderActionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

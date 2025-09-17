<?php

declare(strict_types=1);

namespace app\modules\admin\request\orderBackOrder;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'OrderBackOrderQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class OrderBackOrderQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

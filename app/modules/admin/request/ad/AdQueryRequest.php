<?php

declare(strict_types=1);

namespace app\modules\admin\request\ad;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

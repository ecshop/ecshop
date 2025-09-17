<?php

declare(strict_types=1);

namespace app\modules\admin\request\adCustom;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdCustomQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdCustomQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

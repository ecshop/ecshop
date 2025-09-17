<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminAction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminActionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdminActionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

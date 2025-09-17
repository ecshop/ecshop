<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminRole;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminRoleQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class AdminRoleQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

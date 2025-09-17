<?php

declare(strict_types=1);

namespace app\modules\admin\request\userExtendFields;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserExtendFieldsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserExtendFieldsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

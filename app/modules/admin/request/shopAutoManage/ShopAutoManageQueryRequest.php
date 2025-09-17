<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopAutoManage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopAutoManageQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopAutoManageQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

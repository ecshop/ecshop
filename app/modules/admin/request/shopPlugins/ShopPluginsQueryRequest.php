<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopPlugins;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopPluginsQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopPluginsQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopAgency;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopAgencyQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopAgencyQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

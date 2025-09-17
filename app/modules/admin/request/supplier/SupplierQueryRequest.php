<?php

declare(strict_types=1);

namespace app\modules\admin\request\supplier;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'SupplierQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class SupplierQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\template;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'TemplateQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class TemplateQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailTemplate;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailTemplateQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class EmailTemplateQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

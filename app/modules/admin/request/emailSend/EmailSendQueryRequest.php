<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailSend;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailSendQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class EmailSendQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

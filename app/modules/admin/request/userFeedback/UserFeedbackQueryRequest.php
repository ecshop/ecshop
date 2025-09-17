<?php

declare(strict_types=1);

namespace app\modules\admin\request\userFeedback;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserFeedbackQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserFeedbackQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

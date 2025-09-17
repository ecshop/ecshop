<?php

declare(strict_types=1);

namespace app\modules\admin\request\userBooking;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserBookingQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserBookingQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

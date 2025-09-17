<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityAuction;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityAuctionQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityAuctionQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

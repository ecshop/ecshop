<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAffiliate;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAffiliateQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class UserAffiliateQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

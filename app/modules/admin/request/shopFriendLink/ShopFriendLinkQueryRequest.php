<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopFriendLink;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopFriendLinkQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ShopFriendLinkQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCatRecommend;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCatRecommendQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsCatRecommendQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsGallery;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsGalleryQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class GoodsGalleryQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

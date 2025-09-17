<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityTopic;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityTopicQueryRequest',
    required: [

    ],
    properties: [

    ]
)]
class ActivityTopicQueryRequest extends Validate
{
    protected $rule = [

    ];

    protected $message = [

    ];
}

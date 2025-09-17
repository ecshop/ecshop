<?php

declare(strict_types=1);

namespace app\modules\admin\request\adAdsense;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdAdsenseCreateRequest',
    required: [
        'id',
        'from_ad',
        'referer',
        'clicks',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'from_ad', description: '来源广告ID', type: 'integer'),
        new OA\Property(property: 'referer', description: '来源页面', type: 'string'),
        new OA\Property(property: 'clicks', description: '点击次数', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdAdsenseCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'from_ad' => 'require',
        'referer' => 'require',
        'clicks' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'from_ad.require' => '请设置来源广告ID',
        'referer.require' => '请设置来源页面',
        'clicks.require' => '请设置点击次数',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

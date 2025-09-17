<?php

declare(strict_types=1);

namespace app\modules\admin\request\adCustom;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdCustomUpdateRequest',
    required: [
        'id',
        'ad_type',
        'ad_name',
        'add_time',
        'content',
        'url',
        'ad_status',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '广告ID', type: 'integer'),
        new OA\Property(property: 'ad_type', description: '广告类型', type: 'integer'),
        new OA\Property(property: 'ad_name', description: '广告名称', type: 'string'),
        new OA\Property(property: 'add_time', description: '添加时间', type: 'integer'),
        new OA\Property(property: 'content', description: '广告内容', type: 'string'),
        new OA\Property(property: 'url', description: '广告链接', type: 'string'),
        new OA\Property(property: 'ad_status', description: '广告状态', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdCustomUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'ad_type' => 'require',
        'ad_name' => 'require',
        'add_time' => 'require',
        'content' => 'require',
        'url' => 'require',
        'ad_status' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置广告ID',
        'ad_type.require' => '请设置广告类型',
        'ad_name.require' => '请设置广告名称',
        'add_time.require' => '请设置添加时间',
        'content.require' => '请设置广告内容',
        'url.require' => '请设置广告链接',
        'ad_status.require' => '请设置广告状态',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

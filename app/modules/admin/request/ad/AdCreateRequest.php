<?php

declare(strict_types=1);

namespace app\modules\admin\request\ad;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdCreateRequest',
    required: [
        'id',
        'position_id',
        'media_type',
        'ad_name',
        'ad_link',
        'ad_code',
        'start_time',
        'end_time',
        'link_man',
        'link_email',
        'link_phone',
        'click_count',
        'enabled',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '广告ID', type: 'integer'),
        new OA\Property(property: 'position_id', description: '广告位ID', type: 'integer'),
        new OA\Property(property: 'media_type', description: '媒体类型', type: 'integer'),
        new OA\Property(property: 'ad_name', description: '广告名称', type: 'string'),
        new OA\Property(property: 'ad_link', description: '广告链接', type: 'string'),
        new OA\Property(property: 'ad_code', description: '广告代码', type: 'string'),
        new OA\Property(property: 'start_time', description: '开始时间', type: 'integer'),
        new OA\Property(property: 'end_time', description: '结束时间', type: 'integer'),
        new OA\Property(property: 'link_man', description: '联系人', type: 'string'),
        new OA\Property(property: 'link_email', description: '联系邮箱', type: 'string'),
        new OA\Property(property: 'link_phone', description: '联系电话', type: 'string'),
        new OA\Property(property: 'click_count', description: '点击次数', type: 'integer'),
        new OA\Property(property: 'enabled', description: '是否启用', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'position_id' => 'require',
        'media_type' => 'require',
        'ad_name' => 'require',
        'ad_link' => 'require',
        'ad_code' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'link_man' => 'require',
        'link_email' => 'require',
        'link_phone' => 'require',
        'click_count' => 'require',
        'enabled' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置广告ID',
        'position_id.require' => '请设置广告位ID',
        'media_type.require' => '请设置媒体类型',
        'ad_name.require' => '请设置广告名称',
        'ad_link.require' => '请设置广告链接',
        'ad_code.require' => '请设置广告代码',
        'start_time.require' => '请设置开始时间',
        'end_time.require' => '请设置结束时间',
        'link_man.require' => '请设置联系人',
        'link_email.require' => '请设置联系邮箱',
        'link_phone.require' => '请设置联系电话',
        'click_count.require' => '请设置点击次数',
        'enabled.require' => '请设置是否启用',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

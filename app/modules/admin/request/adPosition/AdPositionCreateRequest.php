<?php

declare(strict_types=1);

namespace app\modules\admin\request\adPosition;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdPositionCreateRequest',
    required: [
        'id',
        'position_name',
        'ad_width',
        'ad_height',
        'position_desc',
        'position_style',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '广告位ID', type: 'integer'),
        new OA\Property(property: 'position_name', description: '广告位名称', type: 'string'),
        new OA\Property(property: 'ad_width', description: '广告位宽度', type: 'integer'),
        new OA\Property(property: 'ad_height', description: '广告位高度', type: 'integer'),
        new OA\Property(property: 'position_desc', description: '广告位描述', type: 'string'),
        new OA\Property(property: 'position_style', description: '广告位样式', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdPositionCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'position_name' => 'require',
        'ad_width' => 'require',
        'ad_height' => 'require',
        'position_desc' => 'require',
        'position_style' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置广告位ID',
        'position_name.require' => '请设置广告位名称',
        'ad_width.require' => '请设置广告位宽度',
        'ad_height.require' => '请设置广告位高度',
        'position_desc.require' => '请设置广告位描述',
        'position_style.require' => '请设置广告位样式',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

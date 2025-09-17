<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopRegion;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopRegionUpdateRequest',
    required: [
        'id',
        'parent_id',
        'region_name',
        'region_type',
        'agency_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '地区ID', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父地区ID', type: 'integer'),
        new OA\Property(property: 'region_name', description: '地区名称', type: 'string'),
        new OA\Property(property: 'region_type', description: '地区类型(1国家/2省份/3城市/4区县)', type: 'integer'),
        new OA\Property(property: 'agency_id', description: '关联代理商ID', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopRegionUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'parent_id' => 'require',
        'region_name' => 'require',
        'region_type' => 'require',
        'agency_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置地区ID',
        'parent_id.require' => '请设置父地区ID',
        'region_name.require' => '请设置地区名称',
        'region_type.require' => '请设置地区类型(1国家/2省份/3城市/4区县)',
        'agency_id.require' => '请设置关联代理商ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

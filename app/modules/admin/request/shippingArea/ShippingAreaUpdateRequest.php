<?php

declare(strict_types=1);

namespace app\modules\admin\request\shippingArea;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingAreaUpdateRequest',
    required: [
        'id',
        'shipping_area_name',
        'shipping_id',
        'configure',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '配送区域ID', type: 'integer'),
        new OA\Property(property: 'shipping_area_name', description: '配送区域名称', type: 'string'),
        new OA\Property(property: 'shipping_id', description: '关联配送方式ID', type: 'integer'),
        new OA\Property(property: 'configure', description: '配置信息(序列化存储)', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShippingAreaUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'shipping_area_name' => 'require',
        'shipping_id' => 'require',
        'configure' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置配送区域ID',
        'shipping_area_name.require' => '请设置配送区域名称',
        'shipping_id.require' => '请设置关联配送方式ID',
        'configure.require' => '请设置配置信息(序列化存储)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

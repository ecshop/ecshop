<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityPackage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityPackageUpdateRequest',
    required: [
        'id',
        'package_id',
        'goods_id',
        'product_id',
        'goods_number',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'package_id', description: '礼包ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_number', description: '商品数量', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityPackageUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'package_id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'goods_number' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'package_id.require' => '请设置礼包ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'goods_number.require' => '请设置商品数量',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

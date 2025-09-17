<?php

declare(strict_types=1);

namespace app\modules\admin\request\supplier;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'SupplierUpdateRequest',
    required: [
        'id',
        'supplier_name',
        'supplier_desc',
        'is_check',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '供应商ID', type: 'integer'),
        new OA\Property(property: 'supplier_name', description: '供应商名称', type: 'string'),
        new OA\Property(property: 'supplier_desc', description: '供应商描述', type: 'string'),
        new OA\Property(property: 'is_check', description: '是否审核(0未审核 1已审核)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class SupplierUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'supplier_name' => 'require',
        'supplier_desc' => 'require',
        'is_check' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置供应商ID',
        'supplier_name.require' => '请设置供应商名称',
        'supplier_desc.require' => '请设置供应商描述',
        'is_check.require' => '请设置是否审核(0未审核 1已审核)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

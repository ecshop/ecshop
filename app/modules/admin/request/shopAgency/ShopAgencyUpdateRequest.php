<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopAgency;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopAgencyUpdateRequest',
    required: [
        'id',
        'agency_name',
        'agency_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '代理商ID', type: 'integer'),
        new OA\Property(property: 'agency_name', description: '代理商名称', type: 'string'),
        new OA\Property(property: 'agency_desc', description: '代理商描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopAgencyUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'agency_name' => 'require',
        'agency_desc' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置代理商ID',
        'agency_name.require' => '请设置代理商名称',
        'agency_desc.require' => '请设置代理商描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

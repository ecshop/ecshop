<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopAutoManage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopAutoManageCreateRequest',
    required: [
        'id',
        'item_id',
        'type',
        'starttime',
        'endtime',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'item_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'type', description: '类型', type: 'string'),
        new OA\Property(property: 'starttime', description: '开始时间', type: 'integer'),
        new OA\Property(property: 'endtime', description: '结束时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopAutoManageCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'item_id' => 'require',
        'type' => 'require',
        'starttime' => 'require',
        'endtime' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'item_id.require' => '请设置商品ID',
        'type.require' => '请设置类型',
        'starttime.require' => '请设置开始时间',
        'endtime.require' => '请设置结束时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

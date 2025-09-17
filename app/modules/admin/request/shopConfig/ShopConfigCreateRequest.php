<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopConfig;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopConfigCreateRequest',
    required: [
        'id',
        'parent_id',
        'code',
        'type',
        'store_range',
        'store_dir',
        'value',
        'sort_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '配置ID', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父配置ID', type: 'integer'),
        new OA\Property(property: 'code', description: '配置代码', type: 'string'),
        new OA\Property(property: 'type', description: '配置类型', type: 'string'),
        new OA\Property(property: 'store_range', description: '存储范围', type: 'string'),
        new OA\Property(property: 'store_dir', description: '存储目录', type: 'string'),
        new OA\Property(property: 'value', description: '配置值', type: 'string'),
        new OA\Property(property: 'sort_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopConfigCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'parent_id' => 'require',
        'code' => 'require',
        'type' => 'require',
        'store_range' => 'require',
        'store_dir' => 'require',
        'value' => 'require',
        'sort_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置配置ID',
        'parent_id.require' => '请设置父配置ID',
        'code.require' => '请设置配置代码',
        'type.require' => '请设置配置类型',
        'store_range.require' => '请设置存储范围',
        'store_dir.require' => '请设置存储目录',
        'value.require' => '请设置配置值',
        'sort_order.require' => '请设置排序权重',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

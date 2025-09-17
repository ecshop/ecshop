<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsType;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsTypeCreateRequest',
    required: [
        'id',
        'cat_name',
        'enabled',
        'attr_group',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '类型ID', type: 'integer'),
        new OA\Property(property: 'cat_name', description: '类型名称', type: 'string'),
        new OA\Property(property: 'enabled', description: '是否启用(1启用 0禁用)', type: 'integer'),
        new OA\Property(property: 'attr_group', description: '属性分组', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsTypeCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_name' => 'require',
        'enabled' => 'require',
        'attr_group' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置类型ID',
        'cat_name.require' => '请设置类型名称',
        'enabled.require' => '请设置是否启用(1启用 0禁用)',
        'attr_group.require' => '请设置属性分组',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

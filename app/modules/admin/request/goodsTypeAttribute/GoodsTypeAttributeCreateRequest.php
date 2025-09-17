<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsTypeAttribute;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsTypeAttributeCreateRequest',
    required: [
        'id',
        'cat_id',
        'attr_name',
        'attr_input_type',
        'attr_type',
        'attr_values',
        'attr_index',
        'sort_order',
        'is_linked',
        'attr_group',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '属性ID', type: 'integer'),
        new OA\Property(property: 'cat_id', description: '商品类型ID', type: 'integer'),
        new OA\Property(property: 'attr_name', description: '属性名称', type: 'string'),
        new OA\Property(property: 'attr_input_type', description: '输入方式', type: 'integer'),
        new OA\Property(property: 'attr_type', description: '属性类型', type: 'integer'),
        new OA\Property(property: 'attr_values', description: '可选值列表', type: 'string'),
        new OA\Property(property: 'attr_index', description: '是否索引', type: 'integer'),
        new OA\Property(property: 'sort_order', description: '排序', type: 'integer'),
        new OA\Property(property: 'is_linked', description: '是否关联', type: 'integer'),
        new OA\Property(property: 'attr_group', description: '属性分组', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsTypeAttributeCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_id' => 'require',
        'attr_name' => 'require',
        'attr_input_type' => 'require',
        'attr_type' => 'require',
        'attr_values' => 'require',
        'attr_index' => 'require',
        'sort_order' => 'require',
        'is_linked' => 'require',
        'attr_group' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置属性ID',
        'cat_id.require' => '请设置商品类型ID',
        'attr_name.require' => '请设置属性名称',
        'attr_input_type.require' => '请设置输入方式',
        'attr_type.require' => '请设置属性类型',
        'attr_values.require' => '请设置可选值列表',
        'attr_index.require' => '请设置是否索引',
        'sort_order.require' => '请设置排序',
        'is_linked.require' => '请设置是否关联',
        'attr_group.require' => '请设置属性分组',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

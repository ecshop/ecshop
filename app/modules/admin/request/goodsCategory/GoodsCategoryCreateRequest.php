<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsCategory;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsCategoryCreateRequest',
    required: [
        'id',
        'cat_name',
        'keywords',
        'cat_desc',
        'parent_id',
        'sort_order',
        'template_file',
        'measure_unit',
        'show_in_nav',
        'style',
        'is_show',
        'grade',
        'filter_attr',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '分类ID', type: 'integer'),
        new OA\Property(property: 'cat_name', description: '分类名称', type: 'string'),
        new OA\Property(property: 'keywords', description: '关键词', type: 'string'),
        new OA\Property(property: 'cat_desc', description: '分类描述', type: 'string'),
        new OA\Property(property: 'parent_id', description: '父分类ID', type: 'integer'),
        new OA\Property(property: 'sort_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'template_file', description: '模板文件', type: 'string'),
        new OA\Property(property: 'measure_unit', description: '计量单位', type: 'string'),
        new OA\Property(property: 'show_in_nav', description: '是否显示在导航栏', type: 'integer'),
        new OA\Property(property: 'style', description: '样式', type: 'string'),
        new OA\Property(property: 'is_show', description: '是否显示', type: 'integer'),
        new OA\Property(property: 'grade', description: '分类等级', type: 'integer'),
        new OA\Property(property: 'filter_attr', description: '筛选属性', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsCategoryCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_name' => 'require',
        'keywords' => 'require',
        'cat_desc' => 'require',
        'parent_id' => 'require',
        'sort_order' => 'require',
        'template_file' => 'require',
        'measure_unit' => 'require',
        'show_in_nav' => 'require',
        'style' => 'require',
        'is_show' => 'require',
        'grade' => 'require',
        'filter_attr' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置分类ID',
        'cat_name.require' => '请设置分类名称',
        'keywords.require' => '请设置关键词',
        'cat_desc.require' => '请设置分类描述',
        'parent_id.require' => '请设置父分类ID',
        'sort_order.require' => '请设置排序权重',
        'template_file.require' => '请设置模板文件',
        'measure_unit.require' => '请设置计量单位',
        'show_in_nav.require' => '请设置是否显示在导航栏',
        'style.require' => '请设置样式',
        'is_show.require' => '请设置是否显示',
        'grade.require' => '请设置分类等级',
        'filter_attr.require' => '请设置筛选属性',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

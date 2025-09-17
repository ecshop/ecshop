<?php

declare(strict_types=1);

namespace app\modules\admin\request\articleCat;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ArticleCatCreateRequest',
    required: [
        'id',
        'cat_name',
        'cat_type',
        'keywords',
        'cat_desc',
        'sort_order',
        'show_in_nav',
        'parent_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '分类ID', type: 'integer'),
        new OA\Property(property: 'cat_name', description: '分类名称', type: 'string'),
        new OA\Property(property: 'cat_type', description: '分类类型', type: 'integer'),
        new OA\Property(property: 'keywords', description: '关键词', type: 'string'),
        new OA\Property(property: 'cat_desc', description: '分类描述', type: 'string'),
        new OA\Property(property: 'sort_order', description: '排序', type: 'integer'),
        new OA\Property(property: 'show_in_nav', description: '是否显示在导航', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父分类ID', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ArticleCatCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_name' => 'require',
        'cat_type' => 'require',
        'keywords' => 'require',
        'cat_desc' => 'require',
        'sort_order' => 'require',
        'show_in_nav' => 'require',
        'parent_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置分类ID',
        'cat_name.require' => '请设置分类名称',
        'cat_type.require' => '请设置分类类型',
        'keywords.require' => '请设置关键词',
        'cat_desc.require' => '请设置分类描述',
        'sort_order.require' => '请设置排序',
        'show_in_nav.require' => '请设置是否显示在导航',
        'parent_id.require' => '请设置父分类ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

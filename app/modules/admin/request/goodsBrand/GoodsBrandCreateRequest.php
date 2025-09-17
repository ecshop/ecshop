<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsBrand;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsBrandCreateRequest',
    required: [
        'id',
        'brand_name',
        'brand_logo',
        'brand_desc',
        'site_url',
        'sort_order',
        'is_show',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '品牌ID', type: 'integer'),
        new OA\Property(property: 'brand_name', description: '品牌名称', type: 'string'),
        new OA\Property(property: 'brand_logo', description: '品牌logo路径', type: 'string'),
        new OA\Property(property: 'brand_desc', description: '品牌描述', type: 'string'),
        new OA\Property(property: 'site_url', description: '品牌官网', type: 'string'),
        new OA\Property(property: 'sort_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'is_show', description: '是否显示(1显示 0隐藏)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsBrandCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'brand_name' => 'require',
        'brand_logo' => 'require',
        'brand_desc' => 'require',
        'site_url' => 'require',
        'sort_order' => 'require',
        'is_show' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置品牌ID',
        'brand_name.require' => '请设置品牌名称',
        'brand_logo.require' => '请设置品牌logo路径',
        'brand_desc.require' => '请设置品牌描述',
        'site_url.require' => '请设置品牌官网',
        'sort_order.require' => '请设置排序权重',
        'is_show.require' => '请设置是否显示(1显示 0隐藏)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

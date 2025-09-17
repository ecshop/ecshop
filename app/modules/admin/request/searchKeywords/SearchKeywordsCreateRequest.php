<?php

declare(strict_types=1);

namespace app\modules\admin\request\searchKeywords;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'SearchKeywordsCreateRequest',
    required: [
        'id',
        'date',
        'searchengine',
        'keyword',
        'count',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'date', description: '统计日期', type: 'string'),
        new OA\Property(property: 'searchengine', description: '搜索引擎名称', type: 'string'),
        new OA\Property(property: 'keyword', description: '搜索关键词', type: 'string'),
        new OA\Property(property: 'count', description: '搜索次数', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class SearchKeywordsCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'date' => 'require',
        'searchengine' => 'require',
        'keyword' => 'require',
        'count' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'date.require' => '请设置统计日期',
        'searchengine.require' => '请设置搜索引擎名称',
        'keyword.require' => '请设置搜索关键词',
        'count.require' => '请设置搜索次数',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\template;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'TemplateCreateRequest',
    required: [
        'id',
        'filename',
        'region',
        'library',
        'sort_order',
        'target_id',
        'number',
        'type',
        'theme',
        'remarks',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'filename', description: '模板文件名', type: 'string'),
        new OA\Property(property: 'region', description: '模板区域', type: 'string'),
        new OA\Property(property: 'library', description: '模板库', type: 'string'),
        new OA\Property(property: 'sort_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'target_id', description: '关联ID', type: 'integer'),
        new OA\Property(property: 'number', description: '显示数量', type: 'integer'),
        new OA\Property(property: 'type', description: '模板类型', type: 'integer'),
        new OA\Property(property: 'theme', description: '主题名称', type: 'string'),
        new OA\Property(property: 'remarks', description: '备注信息', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class TemplateCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'filename' => 'require',
        'region' => 'require',
        'library' => 'require',
        'sort_order' => 'require',
        'target_id' => 'require',
        'number' => 'require',
        'type' => 'require',
        'theme' => 'require',
        'remarks' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'filename.require' => '请设置模板文件名',
        'region.require' => '请设置模板区域',
        'library.require' => '请设置模板库',
        'sort_order.require' => '请设置排序权重',
        'target_id.require' => '请设置关联ID',
        'number.require' => '请设置显示数量',
        'type.require' => '请设置模板类型',
        'theme.require' => '请设置主题名称',
        'remarks.require' => '请设置备注信息',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityTopic;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityTopicUpdateRequest',
    required: [
        'id',
        'title',
        'intro',
        'start_time',
        'end_time',
        'data',
        'template',
        'css',
        'topic_img',
        'title_pic',
        'base_style',
        'htmls',
        'keywords',
        'description',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'title', description: '专题标题', type: 'string'),
        new OA\Property(property: 'intro', description: '专题介绍', type: 'string'),
        new OA\Property(property: 'start_time', description: '开始时间戳', type: 'integer'),
        new OA\Property(property: 'end_time', description: '结束时间戳', type: 'integer'),
        new OA\Property(property: 'data', description: '专题数据', type: 'string'),
        new OA\Property(property: 'template', description: '模板文件', type: 'string'),
        new OA\Property(property: 'css', description: 'CSS样式', type: 'string'),
        new OA\Property(property: 'topic_img', description: '专题图片', type: 'string'),
        new OA\Property(property: 'title_pic', description: '标题图片', type: 'string'),
        new OA\Property(property: 'base_style', description: '基础样式', type: 'string'),
        new OA\Property(property: 'htmls', description: '生成的HTML内容', type: 'string'),
        new OA\Property(property: 'keywords', description: '关键词', type: 'string'),
        new OA\Property(property: 'description', description: '描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityTopicUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'title' => 'require',
        'intro' => 'require',
        'start_time' => 'require',
        'end_time' => 'require',
        'data' => 'require',
        'template' => 'require',
        'css' => 'require',
        'topic_img' => 'require',
        'title_pic' => 'require',
        'base_style' => 'require',
        'htmls' => 'require',
        'keywords' => 'require',
        'description' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'title.require' => '请设置专题标题',
        'intro.require' => '请设置专题介绍',
        'start_time.require' => '请设置开始时间戳',
        'end_time.require' => '请设置结束时间戳',
        'data.require' => '请设置专题数据',
        'template.require' => '请设置模板文件',
        'css.require' => '请设置CSS样式',
        'topic_img.require' => '请设置专题图片',
        'title_pic.require' => '请设置标题图片',
        'base_style.require' => '请设置基础样式',
        'htmls.require' => '请设置生成的HTML内容',
        'keywords.require' => '请设置关键词',
        'description.require' => '请设置描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

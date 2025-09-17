<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityTopicModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_topic';

    /**
     * 设置字段
     */
    protected array $field = [
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
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\template\model;

use think\Model;

class TemplateModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'template';

    /**
     * 设置字段
     */
    protected array $field = [
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
    ];
}

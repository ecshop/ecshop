<?php

declare(strict_types=1);

namespace app\bundles\email\model;

use think\Model;

class EmailTemplateModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'email_template';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'template_code',
        'is_html',
        'template_subject',
        'template_content',
        'last_modify',
        'last_send',
        'type',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

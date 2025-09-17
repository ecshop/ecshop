<?php

declare(strict_types=1);

namespace app\bundles\email\model;

use think\Model;

class EmailSendModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'email_send';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'email',
        'template_id',
        'email_content',
        'error',
        'pri',
        'last_send',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

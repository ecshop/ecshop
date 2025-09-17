<?php

declare(strict_types=1);

namespace app\bundles\admin\model;

use think\Model;

class AdminMessageModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'admin_message';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'sender_id',
        'receiver_id',
        'sent_time',
        'read_time',
        'readed',
        'deleted',
        'title',
        'message',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

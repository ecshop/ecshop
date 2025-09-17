<?php

declare(strict_types=1);

namespace app\bundles\comment\model;

use think\Model;

class CommentModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'comment';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'comment_type',
        'id_value',
        'email',
        'user_name',
        'content',
        'comment_rank',
        'add_time',
        'ip_address',
        'status',
        'parent_id',
        'user_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserFeedbackModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_feedback';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'parent_id',
        'user_id',
        'user_name',
        'user_email',
        'msg_title',
        'msg_type',
        'msg_status',
        'msg_content',
        'msg_time',
        'message_img',
        'order_id',
        'msg_area',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

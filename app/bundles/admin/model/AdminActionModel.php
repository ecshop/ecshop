<?php

declare(strict_types=1);

namespace app\bundles\admin\model;

use think\Model;

class AdminActionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'admin_action';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'parent_id',
        'action_code',
        'relevance',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

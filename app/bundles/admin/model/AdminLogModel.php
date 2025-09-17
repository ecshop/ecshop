<?php

declare(strict_types=1);

namespace app\bundles\admin\model;

use think\Model;

class AdminLogModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'admin_log';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'log_time',
        'user_id',
        'log_info',
        'ip_address',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

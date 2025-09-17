<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserExtendInfoModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_extend_info';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'reg_field_id',
        'content',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

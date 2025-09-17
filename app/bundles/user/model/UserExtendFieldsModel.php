<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserExtendFieldsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_extend_fields';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'reg_field_name',
        'dis_order',
        'display',
        'type',
        'is_need',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\ad\model;

use think\Model;

class AdCustomModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'ad_custom';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'ad_type',
        'ad_name',
        'add_time',
        'content',
        'url',
        'ad_status',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\ad\model;

use think\Model;

class AdModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'ad';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'position_id',
        'media_type',
        'ad_name',
        'ad_link',
        'ad_code',
        'start_time',
        'end_time',
        'link_man',
        'link_email',
        'link_phone',
        'click_count',
        'enabled',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\ad\model;

use think\Model;

class AdPositionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'ad_position';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'position_name',
        'ad_width',
        'ad_height',
        'position_desc',
        'position_style',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

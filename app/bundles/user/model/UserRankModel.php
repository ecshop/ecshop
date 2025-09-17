<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserRankModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_rank';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'rank_name',
        'min_points',
        'max_points',
        'discount',
        'show_price',
        'special_rank',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

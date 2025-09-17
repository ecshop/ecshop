<?php

declare(strict_types=1);

namespace app\bundles\vote\model;

use think\Model;

class VoteOptionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'vote_option';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'vote_id',
        'option_name',
        'option_count',
        'option_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

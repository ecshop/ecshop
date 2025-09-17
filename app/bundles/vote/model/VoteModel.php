<?php

declare(strict_types=1);

namespace app\bundles\vote\model;

use think\Model;

class VoteModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'vote';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'vote_name',
        'start_time',
        'end_time',
        'can_multi',
        'vote_count',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

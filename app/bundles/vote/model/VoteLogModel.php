<?php

declare(strict_types=1);

namespace app\bundles\vote\model;

use think\Model;

class VoteLogModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'vote_log';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'vote_id',
        'ip_address',
        'vote_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

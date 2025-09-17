<?php

declare(strict_types=1);

namespace app\bundles\email\model;

use think\Model;

class EmailSubscriptionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'email_subscription';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'email',
        'stat',
        'hash',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

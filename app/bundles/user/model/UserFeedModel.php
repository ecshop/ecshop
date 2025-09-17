<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserFeedModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_feed';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'value_id',
        'goods_id',
        'product_id',
        'feed_type',
        'is_feed',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

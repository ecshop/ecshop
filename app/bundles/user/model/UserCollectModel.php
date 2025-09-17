<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserCollectModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_collect';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'goods_id',
        'product_id',
        'add_time',
        'is_attention',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

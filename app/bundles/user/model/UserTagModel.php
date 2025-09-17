<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserTagModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_tag';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'goods_id',
        'product_id',
        'tag_words',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

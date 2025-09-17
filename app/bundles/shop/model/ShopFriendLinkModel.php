<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopFriendLinkModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_friend_link';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'link_name',
        'link_url',
        'link_logo',
        'show_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

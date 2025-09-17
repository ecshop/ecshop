<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopNavModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_nav';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'ctype',
        'cid',
        'name',
        'ifshow',
        'vieworder',
        'opennew',
        'url',
        'type',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

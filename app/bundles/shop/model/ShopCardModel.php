<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopCardModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_card';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'card_name',
        'card_img',
        'card_fee',
        'free_money',
        'card_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

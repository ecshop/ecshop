<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopPackModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_pack';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'pack_name',
        'pack_img',
        'pack_fee',
        'free_money',
        'pack_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

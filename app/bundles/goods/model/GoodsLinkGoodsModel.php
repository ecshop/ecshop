<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsLinkGoodsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_link_goods';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'link_goods_id',
        'is_double',
    ];
}

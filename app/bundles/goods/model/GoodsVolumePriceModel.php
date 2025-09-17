<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsVolumePriceModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_volume_price';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'price_type',
        'goods_id',
        'product_id',
        'volume_number',
        'volume_price',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

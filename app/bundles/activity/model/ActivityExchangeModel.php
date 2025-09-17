<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityExchangeModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_exchange';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'product_id',
        'exchange_integral',
        'is_exchange',
        'is_hot',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

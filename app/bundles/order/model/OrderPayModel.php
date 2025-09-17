<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderPayModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_pay';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'order_id',
        'order_amount',
        'order_type',
        'is_paid',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

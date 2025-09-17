<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderActionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_action';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'order_id',
        'action_user',
        'order_status',
        'shipping_status',
        'pay_status',
        'action_place',
        'action_note',
        'log_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

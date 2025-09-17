<?php

declare(strict_types=1);

namespace app\bundles\payment\model;

use think\Model;

class PaymentModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'payment';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'pay_code',
        'pay_name',
        'pay_fee',
        'pay_desc',
        'pay_order',
        'pay_config',
        'enabled',
        'is_cod',
        'is_online',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\shipping\model;

use think\Model;

class ShippingAreaModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shipping_area';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'shipping_area_name',
        'shipping_id',
        'configure',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

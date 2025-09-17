<?php

declare(strict_types=1);

namespace app\bundles\shipping\model;

use think\Model;

class ShippingAreaRegionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shipping_area_region';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'shipping_area_id',
        'region_id',
    ];
}

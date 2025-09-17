<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopAgencyModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_agency';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'agency_name',
        'agency_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

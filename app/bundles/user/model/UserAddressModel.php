<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserAddressModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_address';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'address_name',
        'user_id',
        'consignee',
        'email',
        'country',
        'province',
        'city',
        'district',
        'address',
        'zipcode',
        'tel',
        'mobile',
        'sign_building',
        'best_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

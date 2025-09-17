<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopErrorLogModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_error_log';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'info',
        'file',
        'time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopPluginsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_plugins';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'code',
        'version',
        'library',
        'assign',
        'install_date',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

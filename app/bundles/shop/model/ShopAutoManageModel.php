<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopAutoManageModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_auto_manage';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'item_id',
        'type',
        'starttime',
        'endtime',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

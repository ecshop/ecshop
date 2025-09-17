<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsActivityModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_activity';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'act_name',
        'act_desc',
        'act_type',
        'goods_id',
        'product_id',
        'goods_name',
        'start_time',
        'end_time',
        'is_finished',
        'ext_info',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopStatsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_stats';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'access_time',
        'ip_address',
        'visit_times',
        'browser',
        'system',
        'language',
        'area',
        'referer_domain',
        'referer_path',
        'access_url',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

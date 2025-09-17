<?php

declare(strict_types=1);

namespace app\bundles\shop\model;

use think\Model;

class ShopCronModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'shop_cron';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cron_code',
        'cron_name',
        'cron_desc',
        'cron_order',
        'cron_config',
        'thistime',
        'nextime',
        'day',
        'week',
        'hour',
        'minute',
        'enable',
        'run_once',
        'allow_ip',
        'alow_files',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

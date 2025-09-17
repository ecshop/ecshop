<?php

declare(strict_types=1);

namespace app\bundles\ad\model;

use think\Model;

class AdAdsenseModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'ad_adsense';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'from_ad',
        'referer',
        'clicks',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

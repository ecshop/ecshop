<?php

declare(strict_types=1);

namespace app\bundles\activity\model;

use think\Model;

class ActivityAuctionModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'activity_auction';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'act_id',
        'bid_user',
        'bid_price',
        'bid_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

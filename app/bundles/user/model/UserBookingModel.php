<?php

declare(strict_types=1);

namespace app\bundles\user\model;

use think\Model;

class UserBookingModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'user_booking';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'user_id',
        'email',
        'link_man',
        'tel',
        'goods_id',
        'product_id',
        'goods_desc',
        'goods_number',
        'booking_time',
        'is_dispose',
        'dispose_user',
        'dispose_time',
        'dispose_note',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

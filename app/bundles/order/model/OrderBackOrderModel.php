<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderBackOrderModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_back_order';

    /**
     * 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型.
     */
    protected string $autoWriteTimestamp = 'datetime';

    /**
     * 更新时间字段 false表示关闭.
     */
    protected string $updateTime = 'updated_time';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'delivery_sn',
        'order_sn',
        'order_id',
        'invoice_no',
        'add_time',
        'shipping_id',
        'shipping_name',
        'user_id',
        'action_user',
        'consignee',
        'address',
        'country',
        'province',
        'city',
        'district',
        'sign_building',
        'email',
        'zipcode',
        'tel',
        'mobile',
        'best_time',
        'postscript',
        'how_oos',
        'insure_fee',
        'shipping_fee',
        'update_time',
        'supplier_id',
        'status',
        'return_time',
        'agency_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

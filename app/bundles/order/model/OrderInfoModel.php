<?php

declare(strict_types=1);

namespace app\bundles\order\model;

use think\Model;

class OrderInfoModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'order_info';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'order_sn',
        'user_id',
        'order_status',
        'shipping_status',
        'pay_status',
        'consignee',
        'country',
        'province',
        'city',
        'district',
        'address',
        'zipcode',
        'tel',
        'mobile',
        'email',
        'best_time',
        'sign_building',
        'postscript',
        'shipping_id',
        'shipping_name',
        'pay_id',
        'pay_name',
        'how_oos',
        'how_surplus',
        'pack_name',
        'card_name',
        'card_message',
        'inv_payee',
        'inv_content',
        'goods_amount',
        'shipping_fee',
        'insure_fee',
        'pay_fee',
        'pack_fee',
        'card_fee',
        'money_paid',
        'surplus',
        'integral',
        'integral_money',
        'bonus',
        'order_amount',
        'from_ad',
        'referer',
        'add_time',
        'confirm_time',
        'pay_time',
        'shipping_time',
        'pack_id',
        'card_id',
        'bonus_id',
        'invoice_no',
        'extension_code',
        'extension_id',
        'to_buyer',
        'pay_note',
        'agency_id',
        'inv_type',
        'tax',
        'is_separate',
        'parent_id',
        'discount',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

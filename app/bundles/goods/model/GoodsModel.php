<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_id',
        'goods_sn',
        'goods_name',
        'goods_name_style',
        'click_count',
        'brand_id',
        'provider_name',
        'goods_number',
        'goods_weight',
        'market_price',
        'shop_price',
        'promote_price',
        'promote_start_date',
        'promote_end_date',
        'warn_number',
        'keywords',
        'goods_brief',
        'goods_desc',
        'goods_thumb',
        'goods_img',
        'original_img',
        'is_real',
        'extension_code',
        'is_on_sale',
        'is_alone_sale',
        'is_shipping',
        'integral',
        'add_time',
        'sort_order',
        'is_delete',
        'is_best',
        'is_new',
        'is_hot',
        'is_promote',
        'bonus_type_id',
        'last_update',
        'goods_type',
        'seller_note',
        'give_integral',
        'rank_integral',
        'supplier_id',
        'is_check',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

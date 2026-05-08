<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'goods_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'suppliers_id',
        'is_check',
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_goods';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'rec_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'goods_id',
        'goods_name',
        'goods_sn',
        'product_id',
        'goods_number',
        'market_price',
        'goods_price',
        'goods_attr',
        'send_number',
        'is_real',
        'extension_code',
        'parent_id',
        'is_gift',
        'goods_attr_id',
    ];
}

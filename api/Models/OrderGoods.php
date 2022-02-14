<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderGoods
 * @package App\Models
 */
class OrderGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'order_goods';

    /**
     * @var string
     */
    protected $primaryKey = 'rec_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'rec_id',
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
        'goods_attr_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BackGoods
 * @package App\Models
 */
class BackGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'back_goods';

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
        'back_id',
        'goods_id',
        'product_id',
        'product_sn',
        'goods_name',
        'brand_name',
        'goods_sn',
        'is_real',
        'send_number',
        'goods_attr'
    ];
}

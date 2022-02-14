<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExchangeGoods
 * @package App\Models
 */
class ExchangeGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'exchange_goods';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'goods_id',
        'exchange_integral',
        'is_exchange',
        'is_hot'
    ];
}

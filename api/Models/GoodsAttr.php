<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsAttr
 * @package App\Models
 */
class GoodsAttr extends Model
{
    /**
     * @var string
     */
    protected $table = 'goods_attr';

    /**
     * @var string
     */
    protected $primaryKey = 'goods_attr_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'goods_attr_id',
        'goods_id',
        'attr_id',
        'attr_value',
        'attr_price'
    ];
}

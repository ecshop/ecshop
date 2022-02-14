<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LinkGoods
 * @package App\Models
 */
class LinkGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'link_goods';

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
        'link_goods_id',
        'is_double',
        'admin_id'
    ];
}

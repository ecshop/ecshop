<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupGoods
 * @package App\Models
 */
class GroupGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'group_goods';

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
        'parent_id',
        'goods_id',
        'goods_price',
        'admin_id'
    ];
}

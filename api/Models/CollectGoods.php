<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CollectGoods
 * @package App\Models
 */
class CollectGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'collect_goods';

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
        'user_id',
        'goods_id',
        'add_time',
        'is_attention'
    ];
}

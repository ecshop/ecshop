<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberPrice
 * @package App\Models
 */
class MemberPrice extends Model
{
    /**
     * @var string
     */
    protected $table = 'member_price';

    /**
     * @var string
     */
    protected $primaryKey = 'price_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'price_id',
        'goods_id',
        'user_rank',
        'user_price'
    ];
}

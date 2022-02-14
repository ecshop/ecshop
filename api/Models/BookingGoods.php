<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookingGoods
 * @package App\Models
 */
class BookingGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'booking_goods';

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
        'email',
        'link_man',
        'tel',
        'goods_id',
        'goods_desc',
        'goods_number',
        'booking_time',
        'is_dispose',
        'dispose_user',
        'dispose_time',
        'dispose_note'
    ];
}

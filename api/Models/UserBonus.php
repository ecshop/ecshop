<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBonus
 * @package App\Models
 */
class UserBonus extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_bonus';

    /**
     * @var string
     */
    protected $primaryKey = 'bonus_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'bonus_id',
        'bonus_type_id',
        'bonus_sn',
        'user_id',
        'used_time',
        'order_id',
        'emailed'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BonusType
 * @package App\Models
 */
class BonusType extends Model
{
    /**
     * @var string
     */
    protected $table = 'bonus_type';

    /**
     * @var string
     */
    protected $primaryKey = 'type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type_id',
        'type_name',
        'type_money',
        'send_type',
        'min_amount',
        'max_amount',
        'send_start_date',
        'send_end_date',
        'use_start_date',
        'use_end_date',
        'min_goods_amount'
    ];
}

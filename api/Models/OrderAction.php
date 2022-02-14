<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderAction
 * @package App\Models
 */
class OrderAction extends Model
{
    /**
     * @var string
     */
    protected $table = 'order_action';

    /**
     * @var string
     */
    protected $primaryKey = 'action_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'action_id',
        'order_id',
        'action_user',
        'order_status',
        'shipping_status',
        'pay_status',
        'action_place',
        'action_note',
        'log_time'
    ];
}

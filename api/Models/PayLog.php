<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PayLog
 * @package App\Models
 */
class PayLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'pay_log';

    /**
     * @var string
     */
    protected $primaryKey = 'log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'log_id',
        'order_id',
        'order_amount',
        'order_type',
        'is_paid'
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pay_log';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'order_amount',
        'order_type',
        'is_paid',
    ];
}

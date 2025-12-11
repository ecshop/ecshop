<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SnatchLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'snatch_log';

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
        'snatch_id',
        'user_id',
        'bid_price',
        'bid_time',
    ];
}

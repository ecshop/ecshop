<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SnatchLog
 * @package App\Models
 */
class SnatchLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'snatch_log';

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
        'snatch_id',
        'user_id',
        'bid_price',
        'bid_time'
    ];
}

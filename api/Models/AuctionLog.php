<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AuctionLog
 * @package App\Models
 */
class AuctionLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'auction_log';

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
        'act_id',
        'bid_user',
        'bid_price',
        'bid_time'
    ];
}

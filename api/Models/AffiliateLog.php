<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AffiliateLog
 * @package App\Models
 */
class AffiliateLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'affiliate_log';

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
        'time',
        'user_id',
        'user_name',
        'money',
        'point',
        'separate_type'
    ];
}

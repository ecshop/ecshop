<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoteLog
 * @package App\Models
 */
class VoteLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'vote_log';

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
        'vote_id',
        'ip_address',
        'vote_time'
    ];
}

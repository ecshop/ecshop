<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminLog
 * @package App\Models
 */
class AdminLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'admin_log';

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
        'log_time',
        'user_id',
        'log_info',
        'ip_address'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crons
 * @package App\Models
 */
class Crons extends Model
{
    /**
     * @var string
     */
    protected $table = 'crons';

    /**
     * @var string
     */
    protected $primaryKey = 'cron_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cron_id',
        'cron_code',
        'cron_name',
        'cron_desc',
        'cron_order',
        'cron_config',
        'thistime',
        'nextime',
        'day',
        'week',
        'hour',
        'minute',
        'enable',
        'run_once',
        'allow_ip',
        'alow_files'
    ];
}

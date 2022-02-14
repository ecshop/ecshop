<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stats
 * @package App\Models
 */
class Stats extends Model
{
    /**
     * @var string
     */
    protected $table = 'stats';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'access_time',
        'ip_address',
        'visit_times',
        'browser',
        'system',
        'language',
        'area',
        'referer_domain',
        'referer_path',
        'access_url'
    ];
}

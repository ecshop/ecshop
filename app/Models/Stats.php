<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stats';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'access_time',
        'ip_address',
        'visit_times',
        'browser',
        'system',
        'language',
        'area',
        'referer_domain',
        'referer_path',
        'access_url',
    ];
}

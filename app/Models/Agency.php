<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agency';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'agency_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agency_name',
        'agency_desc',
    ];
}

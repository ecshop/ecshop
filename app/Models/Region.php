<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'region';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'region_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'region_name',
        'region_type',
        'agency_id',
    ];
}

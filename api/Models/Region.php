<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * @package App\Models
 */
class Region extends Model
{
    /**
     * @var string
     */
    protected $table = 'region';

    /**
     * @var string
     */
    protected $primaryKey = 'region_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'region_id',
        'parent_id',
        'region_name',
        'region_type',
        'agency_id'
    ];
}

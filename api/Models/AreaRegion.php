<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AreaRegion
 * @package App\Models
 */
class AreaRegion extends Model
{
    /**
     * @var string
     */
    protected $table = 'area_region';

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
        'shipping_area_id',
        'region_id'
    ];
}

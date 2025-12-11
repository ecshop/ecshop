<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaRegion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'area_region';

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
        'shipping_area_id',
        'region_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingArea
 * @package App\Models
 */
class ShippingArea extends Model
{
    /**
     * @var string
     */
    protected $table = 'shipping_area';

    /**
     * @var string
     */
    protected $primaryKey = 'shipping_area_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'shipping_area_id',
        'shipping_area_name',
        'shipping_id',
        'configure'
    ];
}

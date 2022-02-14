<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shipping
 * @package App\Models
 */
class Shipping extends Model
{
    /**
     * @var string
     */
    protected $table = 'shipping';

    /**
     * @var string
     */
    protected $primaryKey = 'shipping_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'shipping_id',
        'shipping_code',
        'shipping_name',
        'shipping_desc',
        'insure',
        'support_cod',
        'enabled',
        'shipping_print',
        'print_bg',
        'config_lable',
        'print_model',
        'shipping_order'
    ];
}

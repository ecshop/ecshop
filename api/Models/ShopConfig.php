<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopConfig
 * @package App\Models
 */
class ShopConfig extends Model
{
    /**
     * @var string
     */
    protected $table = 'shop_config';

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
        'parent_id',
        'code',
        'type',
        'store_range',
        'store_dir',
        'value',
        'sort_order'
    ];
}

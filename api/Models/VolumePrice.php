<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VolumePrice
 * @package App\Models
 */
class VolumePrice extends Model
{
    /**
     * @var string
     */
    protected $table = 'volume_price';

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
        'price_type',
        'goods_id',
        'volume_number',
        'volume_price'
    ];
}

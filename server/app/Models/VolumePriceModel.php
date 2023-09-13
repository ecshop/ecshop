<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolumePriceModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'volume_price';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'price_type',
        'goods_id',
        'volume_number',
        'volume_price',
    ];
}

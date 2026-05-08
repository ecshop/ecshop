<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolumePrice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'volume_price';

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
        'price_type',
        'goods_id',
        'volume_number',
        'volume_price',
    ];
}

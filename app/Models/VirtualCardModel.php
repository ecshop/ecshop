<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualCardModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'virtual_card';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id',
        'goods_id',
        'card_sn',
        'card_password',
        'add_date',
        'end_date',
        'is_saled',
        'order_sn',
        'crc32',
    ];
}

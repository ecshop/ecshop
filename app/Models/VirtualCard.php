<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualCard extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'virtual_card';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'card_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

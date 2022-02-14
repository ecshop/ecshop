<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VirtualCard
 * @package App\Models
 */
class VirtualCard extends Model
{
    /**
     * @var string
     */
    protected $table = 'virtual_card';

    /**
     * @var string
     */
    protected $primaryKey = 'card_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
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
        'crc32'
    ];
}

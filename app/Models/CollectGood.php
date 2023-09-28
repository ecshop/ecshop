<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectGood extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collect_goods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rec_id',
        'user_id',
        'goods_id',
        'add_time',
        'is_attention',
    ];
}

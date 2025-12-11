<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPrice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member_price';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'price_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'goods_id',
        'user_rank',
        'user_price',
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRank extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_rank';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rank_id',
        'rank_name',
        'min_points',
        'max_points',
        'discount',
        'show_price',
        'special_rank',
    ];
}

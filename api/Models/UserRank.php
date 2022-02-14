<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRank
 * @package App\Models
 */
class UserRank extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_rank';

    /**
     * @var string
     */
    protected $primaryKey = 'rank_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'rank_id',
        'rank_name',
        'min_points',
        'max_points',
        'discount',
        'show_price',
        'special_rank'
    ];
}

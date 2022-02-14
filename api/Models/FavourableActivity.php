<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FavourableActivity
 * @package App\Models
 */
class FavourableActivity extends Model
{
    /**
     * @var string
     */
    protected $table = 'favourable_activity';

    /**
     * @var string
     */
    protected $primaryKey = 'act_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'act_id',
        'act_name',
        'start_time',
        'end_time',
        'user_rank',
        'act_range',
        'act_range_ext',
        'min_amount',
        'max_amount',
        'act_type',
        'act_type_ext',
        'gift',
        'sort_order'
    ];
}

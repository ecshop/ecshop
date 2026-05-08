<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavourableActivity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'favourable_activity';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'act_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'sort_order',
    ];
}

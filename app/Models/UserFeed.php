<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeed extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_feed';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'feed_id',
        'user_id',
        'value_id',
        'goods_id',
        'feed_type',
        'is_feed',
    ];
}

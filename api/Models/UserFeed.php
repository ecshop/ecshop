<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserFeed
 * @package App\Models
 */
class UserFeed extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_feed';

    /**
     * @var string
     */
    protected $primaryKey = 'feed_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'feed_id',
        'user_id',
        'value_id',
        'goods_id',
        'feed_type',
        'is_feed'
    ];
}

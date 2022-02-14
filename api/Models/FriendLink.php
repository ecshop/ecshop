<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendLink
 * @package App\Models
 */
class FriendLink extends Model
{
    /**
     * @var string
     */
    protected $table = 'friend_link';

    /**
     * @var string
     */
    protected $primaryKey = 'link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'link_id',
        'link_name',
        'link_url',
        'link_logo',
        'show_order'
    ];
}

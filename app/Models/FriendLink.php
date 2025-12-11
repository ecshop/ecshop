<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'friend_link';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link_name',
        'link_url',
        'link_logo',
        'show_order',
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sesskey',
        'expiry',
        'userid',
        'adminid',
        'ip',
        'user_name',
        'user_rank',
        'discount',
        'email',
        'data',
    ];
}

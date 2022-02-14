<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAuth
 * @package App\Models
 */
class UserAuth extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_auth';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'passport',
        'password',
        'salt',
        'access_token',
        'refresh_token'
    ];
}

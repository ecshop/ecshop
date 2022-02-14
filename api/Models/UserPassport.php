<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserPassport
 * @package App\Models
 */
class UserPassport extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_passport';

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

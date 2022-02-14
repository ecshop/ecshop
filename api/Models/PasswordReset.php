<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordReset
 * @package App\Models
 */
class PasswordReset extends Model
{
    /**
     * @var string
     */
    protected $table = 'password_reset';

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
        'type',
        'passport',
        'token'
    ];
}

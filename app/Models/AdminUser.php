<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'ec_salt',
        'add_time',
        'last_login',
        'last_ip',
        'action_list',
        'nav_list',
        'lang_type',
        'agency_id',
        'suppliers_id',
        'todolist',
        'role_id',
    ];
}

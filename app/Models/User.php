<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'email',
        'user_name',
        'password',
        'question',
        'answer',
        'sex',
        'birthday',
        'user_money',
        'frozen_money',
        'pay_points',
        'rank_points',
        'address_id',
        'reg_time',
        'last_login',
        'last_time',
        'last_ip',
        'visit_count',
        'user_rank',
        'is_special',
        'ec_salt',
        'salt',
        'parent_id',
        'flag',
        'alias',
        'msn',
        'qq',
        'office_phone',
        'home_phone',
        'mobile_phone',
        'is_validated',
        'credit_line',
        'passwd_question',
        'passwd_answer',
    ];
}

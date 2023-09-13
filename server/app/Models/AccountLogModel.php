<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountLogModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'log_id',
        'user_id',
        'user_money',
        'frozen_money',
        'rank_points',
        'pay_points',
        'change_time',
        'change_desc',
        'change_type',
    ];
}

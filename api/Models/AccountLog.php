<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountLog
 * @package App\Models
 */
class AccountLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'account_log';

    /**
     * @var string
     */
    protected $primaryKey = 'log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
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
        'change_type'
    ];
}

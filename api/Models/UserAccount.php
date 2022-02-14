<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAccount
 * @package App\Models
 */
class UserAccount extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_account';

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
        'admin_user',
        'amount',
        'add_time',
        'paid_time',
        'admin_note',
        'user_note',
        'process_type',
        'payment',
        'is_paid'
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccountModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
        'is_paid',
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pay_id',
        'pay_code',
        'pay_name',
        'pay_fee',
        'pay_desc',
        'pay_order',
        'pay_config',
        'enabled',
        'is_cod',
        'is_online',
    ];
}

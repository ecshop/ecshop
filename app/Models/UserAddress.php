<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_address';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'address_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address_name',
        'user_id',
        'consignee',
        'email',
        'country',
        'province',
        'city',
        'district',
        'address',
        'zipcode',
        'tel',
        'mobile',
        'sign_building',
        'best_time',
    ];
}

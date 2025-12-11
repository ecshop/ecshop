<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery_order';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'delivery_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'delivery_sn',
        'order_sn',
        'order_id',
        'invoice_no',
        'add_time',
        'shipping_id',
        'shipping_name',
        'user_id',
        'action_user',
        'consignee',
        'address',
        'country',
        'province',
        'city',
        'district',
        'sign_building',
        'email',
        'zipcode',
        'tel',
        'mobile',
        'best_time',
        'postscript',
        'how_oos',
        'insure_fee',
        'shipping_fee',
        'update_time',
        'suppliers_id',
        'status',
        'agency_id',
    ];
}

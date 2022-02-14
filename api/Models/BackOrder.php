<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BackOrder
 * @package App\Models
 */
class BackOrder extends Model
{
    /**
     * @var string
     */
    protected $table = 'back_order';

    /**
     * @var string
     */
    protected $primaryKey = 'back_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'back_id',
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
        'return_time',
        'agency_id'
    ];
}

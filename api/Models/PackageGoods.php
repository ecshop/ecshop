<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PackageGoods
 * @package App\Models
 */
class PackageGoods extends Model
{
    /**
     * @var string
     */
    protected $table = 'package_goods';

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
        'package_id',
        'goods_id',
        'product_id',
        'goods_number',
        'admin_id'
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkGoodModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'link_goods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'goods_id',
        'link_goods_id',
        'is_double',
        'admin_id',
    ];
}

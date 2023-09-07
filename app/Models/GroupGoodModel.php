<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupGoodModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_goods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'parent_id',
        'goods_id',
        'goods_price',
        'admin_id',
    ];
}

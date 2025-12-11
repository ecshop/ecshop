<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsCat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods_cat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'goods_id',
        'cat_id',
    ];
}

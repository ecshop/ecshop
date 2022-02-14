<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsCat
 * @package App\Models
 */
class GoodsCat extends Model
{
    /**
     * @var string
     */
    protected $table = 'goods_cat';

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
        'goods_id',
        'cat_id'
    ];
}

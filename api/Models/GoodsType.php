<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsType
 * @package App\Models
 */
class GoodsType extends Model
{
    /**
     * @var string
     */
    protected $table = 'goods_type';

    /**
     * @var string
     */
    protected $primaryKey = 'cat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cat_id',
        'cat_name',
        'enabled',
        'attr_group'
    ];
}

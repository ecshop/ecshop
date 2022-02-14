<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wholesale
 * @package App\Models
 */
class Wholesale extends Model
{
    /**
     * @var string
     */
    protected $table = 'wholesale';

    /**
     * @var string
     */
    protected $primaryKey = 'act_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'act_id',
        'goods_id',
        'goods_name',
        'rank_ids',
        'prices',
        'enabled'
    ];
}

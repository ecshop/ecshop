<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wholesale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wholesale';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'act_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'goods_id',
        'goods_name',
        'rank_ids',
        'prices',
        'enabled',
    ];
}

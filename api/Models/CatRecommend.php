<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatRecommend
 * @package App\Models
 */
class CatRecommend extends Model
{
    /**
     * @var string
     */
    protected $table = 'cat_recommend';

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
        'cat_id',
        'recommend_type'
    ];
}

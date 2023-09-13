<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatRecommendModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cat_recommend';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'cat_id',
        'recommend_type',
    ];
}

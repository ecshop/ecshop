<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCatModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_cat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cat_id',
        'cat_name',
        'cat_type',
        'keywords',
        'cat_desc',
        'sort_order',
        'show_in_nav',
        'parent_id',
    ];
}

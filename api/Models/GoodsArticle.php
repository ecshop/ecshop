<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsArticle
 * @package App\Models
 */
class GoodsArticle extends Model
{
    /**
     * @var string
     */
    protected $table = 'goods_article';

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
        'article_id',
        'admin_id'
    ];
}

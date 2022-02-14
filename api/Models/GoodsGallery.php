<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsGallery
 * @package App\Models
 */
class GoodsGallery extends Model
{
    /**
     * @var string
     */
    protected $table = 'goods_gallery';

    /**
     * @var string
     */
    protected $primaryKey = 'img_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'img_id',
        'goods_id',
        'img_url',
        'img_desc',
        'thumb_url',
        'img_original',
        'sort_order'
    ];
}

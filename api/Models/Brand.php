<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Models
 */
class Brand extends Model
{
    /**
     * @var string
     */
    protected $table = 'brand';

    /**
     * @var string
     */
    protected $primaryKey = 'brand_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_logo',
        'brand_desc',
        'site_url',
        'sort_order',
        'is_show'
    ];
}

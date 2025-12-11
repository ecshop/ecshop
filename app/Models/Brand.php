<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brand';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'brand_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_name',
        'brand_logo',
        'brand_desc',
        'site_url',
        'sort_order',
        'is_show',
    ];
}

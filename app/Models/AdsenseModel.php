<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsenseModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adsense';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'from_ad',
        'referer',
        'clicks',
    ];
}

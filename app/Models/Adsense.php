<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adsense extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adsense';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_ad',
        'referer',
        'clicks',
    ];
}

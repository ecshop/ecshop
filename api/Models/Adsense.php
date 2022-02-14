<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Adsense
 * @package App\Models
 */
class Adsense extends Model
{
    /**
     * @var string
     */
    protected $table = 'adsense';

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
        'from_ad',
        'referer',
        'clicks'
    ];
}

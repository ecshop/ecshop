<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdPosition
 * @package App\Models
 */
class AdPosition extends Model
{
    /**
     * @var string
     */
    protected $table = 'ad_position';

    /**
     * @var string
     */
    protected $primaryKey = 'position_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'position_id',
        'position_name',
        'ad_width',
        'ad_height',
        'position_desc',
        'position_style'
    ];
}

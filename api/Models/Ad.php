<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ad
 * @package App\Models
 */
class Ad extends Model
{
    /**
     * @var string
     */
    protected $table = 'ad';

    /**
     * @var string
     */
    protected $primaryKey = 'ad_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ad_id',
        'position_id',
        'media_type',
        'ad_name',
        'ad_link',
        'ad_code',
        'start_time',
        'end_time',
        'link_man',
        'link_email',
        'link_phone',
        'click_count',
        'enabled'
    ];
}

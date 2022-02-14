<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdCustom
 * @package App\Models
 */
class AdCustom extends Model
{
    /**
     * @var string
     */
    protected $table = 'ad_custom';

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
        'ad_type',
        'ad_name',
        'add_time',
        'content',
        'url',
        'ad_status'
    ];
}

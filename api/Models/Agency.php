<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 * @package App\Models
 */
class Agency extends Model
{
    /**
     * @var string
     */
    protected $table = 'agency';

    /**
     * @var string
     */
    protected $primaryKey = 'agency_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'agency_id',
        'agency_name',
        'agency_desc'
    ];
}

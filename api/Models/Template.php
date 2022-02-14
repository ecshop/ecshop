<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 * @package App\Models
 */
class Template extends Model
{
    /**
     * @var string
     */
    protected $table = 'template';

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
        'filename',
        'region',
        'library',
        'sort_order',
        'id_value',
        'number',
        'type',
        'theme',
        'remarks'
    ];
}

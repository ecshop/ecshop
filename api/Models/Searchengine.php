<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Searchengine
 * @package App\Models
 */
class Searchengine extends Model
{
    /**
     * @var string
     */
    protected $table = 'searchengine';

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
        'date',
        'searchengine',
        'count'
    ];
}

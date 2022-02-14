<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Keywords
 * @package App\Models
 */
class Keywords extends Model
{
    /**
     * @var string
     */
    protected $table = 'keywords';

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
        'keyword',
        'count'
    ];
}

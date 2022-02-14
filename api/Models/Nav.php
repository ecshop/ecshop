<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nav
 * @package App\Models
 */
class Nav extends Model
{
    /**
     * @var string
     */
    protected $table = 'nav';

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
        'ctype',
        'cid',
        'name',
        'ifshow',
        'vieworder',
        'opennew',
        'url',
        'type'
    ];
}

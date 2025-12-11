<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nav';

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
        'ctype',
        'cid',
        'name',
        'ifshow',
        'vieworder',
        'opennew',
        'url',
        'type',
    ];
}

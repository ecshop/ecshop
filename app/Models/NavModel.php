<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nav';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
        'type',
    ];
}

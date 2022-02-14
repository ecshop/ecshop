<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plugins
 * @package App\Models
 */
class Plugins extends Model
{
    /**
     * @var string
     */
    protected $table = 'plugins';

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
        'code',
        'version',
        'library',
        'assign',
        'install_date'
    ];
}

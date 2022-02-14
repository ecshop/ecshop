<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ErrorLog
 * @package App\Models
 */
class ErrorLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'error_log';

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
        'info',
        'file',
        'time'
    ];
}

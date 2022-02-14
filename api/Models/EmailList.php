<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailList
 * @package App\Models
 */
class EmailList extends Model
{
    /**
     * @var string
     */
    protected $table = 'email_list';

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
        'email',
        'stat',
        'hash'
    ];
}

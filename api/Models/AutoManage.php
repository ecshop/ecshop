<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AutoManage
 * @package App\Models
 */
class AutoManage extends Model
{
    /**
     * @var string
     */
    protected $table = 'auto_manage';

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
        'item_id',
        'type',
        'starttime',
        'endtime'
    ];
}

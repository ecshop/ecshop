<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminAction
 * @package App\Models
 */
class AdminAction extends Model
{
    /**
     * @var string
     */
    protected $table = 'admin_action';

    /**
     * @var string
     */
    protected $primaryKey = 'action_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'action_id',
        'parent_id',
        'action_code',
        'relevance'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminRules
 * @package App\Models
 */
class AdminRules extends Model
{
    /**
     * @var string
     */
    protected $table = 'admin_rules';

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
        'parent_id',
        'name',
        'url',
        'icon',
        'menu',
        'sort',
        'status'
    ];
}

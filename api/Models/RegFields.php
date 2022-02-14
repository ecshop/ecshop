<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegFields
 * @package App\Models
 */
class RegFields extends Model
{
    /**
     * @var string
     */
    protected $table = 'reg_fields';

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
        'reg_field_name',
        'dis_order',
        'display',
        'type',
        'is_need'
    ];
}

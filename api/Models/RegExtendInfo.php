<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegExtendInfo
 * @package App\Models
 */
class RegExtendInfo extends Model
{
    /**
     * @var string
     */
    protected $table = 'reg_extend_info';

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
        'user_id',
        'reg_field_id',
        'content'
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegExtendInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reg_extend_info';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'reg_field_id',
        'content',
    ];
}

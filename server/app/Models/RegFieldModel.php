<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegFieldModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reg_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'reg_field_name',
        'dis_order',
        'display',
        'type',
        'is_need',
    ];
}

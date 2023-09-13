<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'template';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'filename',
        'region',
        'library',
        'sort_order',
        'id_value',
        'number',
        'type',
        'theme',
        'remarks',
    ];
}

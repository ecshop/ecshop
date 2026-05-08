<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'suppliers_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'suppliers_name',
        'suppliers_desc',
        'is_check',
    ];
}

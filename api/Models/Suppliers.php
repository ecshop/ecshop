<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Suppliers
 * @package App\Models
 */
class Suppliers extends Model
{
    /**
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * @var string
     */
    protected $primaryKey = 'suppliers_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'suppliers_id',
        'suppliers_name',
        'suppliers_desc',
        'is_check'
    ];
}

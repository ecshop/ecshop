<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pack';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pack_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pack_name',
        'pack_img',
        'pack_fee',
        'free_money',
        'pack_desc',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pack
 * @package App\Models
 */
class Pack extends Model
{
    /**
     * @var string
     */
    protected $table = 'pack';

    /**
     * @var string
     */
    protected $primaryKey = 'pack_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pack_id',
        'pack_name',
        'pack_img',
        'pack_fee',
        'free_money',
        'pack_desc'
    ];
}

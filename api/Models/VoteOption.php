<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoteOption
 * @package App\Models
 */
class VoteOption extends Model
{
    /**
     * @var string
     */
    protected $table = 'vote_option';

    /**
     * @var string
     */
    protected $primaryKey = 'option_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'option_id',
        'vote_id',
        'option_name',
        'option_count',
        'option_order'
    ];
}

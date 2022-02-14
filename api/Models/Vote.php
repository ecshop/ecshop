<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * @package App\Models
 */
class Vote extends Model
{
    /**
     * @var string
     */
    protected $table = 'vote';

    /**
     * @var string
     */
    protected $primaryKey = 'vote_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'vote_id',
        'vote_name',
        'start_time',
        'end_time',
        'can_multi',
        'vote_count'
    ];
}

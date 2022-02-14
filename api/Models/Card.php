<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 * @package App\Models
 */
class Card extends Model
{
    /**
     * @var string
     */
    protected $table = 'card';

    /**
     * @var string
     */
    protected $primaryKey = 'card_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'card_id',
        'card_name',
        'card_img',
        'card_fee',
        'free_money',
        'card_desc'
    ];
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id',
        'card_name',
        'card_img',
        'card_fee',
        'free_money',
        'card_desc',
    ];
}

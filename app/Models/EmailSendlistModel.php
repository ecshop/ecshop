<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSendlistModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'email_sendlist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'template_id',
        'email_content',
        'error',
        'pri',
        'last_send',
    ];
}

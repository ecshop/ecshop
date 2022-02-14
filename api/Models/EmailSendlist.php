<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailSendlist
 * @package App\Models
 */
class EmailSendlist extends Model
{
    /**
     * @var string
     */
    protected $table = 'email_sendlist';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'email',
        'template_id',
        'email_content',
        'error',
        'pri',
        'last_send'
    ];
}

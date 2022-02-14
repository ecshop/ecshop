<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * @package App\Models
 */
class Feedback extends Model
{
    /**
     * @var string
     */
    protected $table = 'feedback';

    /**
     * @var string
     */
    protected $primaryKey = 'msg_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'msg_id',
        'parent_id',
        'user_id',
        'user_name',
        'user_email',
        'msg_title',
        'msg_type',
        'msg_status',
        'msg_content',
        'msg_time',
        'message_img',
        'order_id',
        'msg_area'
    ];
}

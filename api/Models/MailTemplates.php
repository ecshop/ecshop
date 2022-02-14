<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MailTemplates
 * @package App\Models
 */
class MailTemplates extends Model
{
    /**
     * @var string
     */
    protected $table = 'mail_templates';

    /**
     * @var string
     */
    protected $primaryKey = 'template_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'template_id',
        'template_code',
        'is_html',
        'template_subject',
        'template_content',
        'last_modify',
        'last_send',
        'type'
    ];
}

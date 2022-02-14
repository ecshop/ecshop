<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Topic
 * @package App\Models
 */
class Topic extends Model
{
    /**
     * @var string
     */
    protected $table = 'topic';

    /**
     * @var string
     */
    protected $primaryKey = 'topic_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'topic_id',
        'title',
        'intro',
        'start_time',
        'end_time',
        'data',
        'template',
        'css',
        'topic_img',
        'title_pic',
        'base_style',
        'htmls',
        'keywords',
        'description'
    ];
}

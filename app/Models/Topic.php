<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'topic';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
        'description',
    ];
}

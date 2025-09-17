<?php

declare(strict_types=1);

namespace app\bundles\article\model;

use think\Model;

class ArticleModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'article';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_id',
        'title',
        'content',
        'author',
        'author_email',
        'keywords',
        'article_type',
        'is_open',
        'add_time',
        'file_url',
        'open_type',
        'link',
        'description',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

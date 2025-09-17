<?php

declare(strict_types=1);

namespace app\bundles\article\model;

use think\Model;

class ArticleCatModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'article_cat';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_name',
        'cat_type',
        'keywords',
        'cat_desc',
        'sort_order',
        'show_in_nav',
        'parent_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

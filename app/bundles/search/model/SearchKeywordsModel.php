<?php

declare(strict_types=1);

namespace app\bundles\search\model;

use think\Model;

class SearchKeywordsModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'search_keywords';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'date',
        'searchengine',
        'keyword',
        'count',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

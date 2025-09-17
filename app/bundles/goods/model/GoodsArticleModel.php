<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsArticleModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_article';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'article_id',
    ];
}

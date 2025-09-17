<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsCatRecommendModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_cat_recommend';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'cat_id',
        'recommend_type',
    ];
}

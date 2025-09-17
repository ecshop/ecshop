<?php

declare(strict_types=1);

namespace app\bundles\goods\model;

use think\Model;

class GoodsGalleryModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'goods_gallery';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'goods_id',
        'product_id',
        'img_url',
        'img_desc',
        'thumb_url',
        'img_original',
        'sort_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}

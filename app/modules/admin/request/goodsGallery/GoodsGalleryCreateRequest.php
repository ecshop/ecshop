<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsGallery;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsGalleryCreateRequest',
    required: [
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
    ],
    properties: [
        new OA\Property(property: 'id', description: '图片ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'img_url', description: '图片URL', type: 'string'),
        new OA\Property(property: 'img_desc', description: '图片描述', type: 'string'),
        new OA\Property(property: 'thumb_url', description: '缩略图URL', type: 'string'),
        new OA\Property(property: 'img_original', description: '原始图片URL', type: 'string'),
        new OA\Property(property: 'sort_order', description: '', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsGalleryCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'img_url' => 'require',
        'img_desc' => 'require',
        'thumb_url' => 'require',
        'img_original' => 'require',
        'sort_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置图片ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'img_url.require' => '请设置图片URL',
        'img_desc.require' => '请设置图片描述',
        'thumb_url.require' => '请设置缩略图URL',
        'img_original.require' => '请设置原始图片URL',
        'sort_order.require' => '请设置',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

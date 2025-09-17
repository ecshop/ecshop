<?php

declare(strict_types=1);

namespace app\modules\admin\request\userTag;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserTagUpdateRequest',
    required: [
        'id',
        'user_id',
        'goods_id',
        'product_id',
        'tag_words',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '标签ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'tag_words', description: '标签内容', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserTagUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'tag_words' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置标签ID',
        'user_id.require' => '请设置用户ID',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'tag_words.require' => '请设置标签内容',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

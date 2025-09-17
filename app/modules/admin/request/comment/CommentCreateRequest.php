<?php

declare(strict_types=1);

namespace app\modules\admin\request\comment;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'CommentCreateRequest',
    required: [
        'id',
        'comment_type',
        'id_value',
        'email',
        'user_name',
        'content',
        'comment_rank',
        'add_time',
        'ip_address',
        'status',
        'parent_id',
        'user_id',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '评论ID', type: 'integer'),
        new OA\Property(property: 'comment_type', description: '评论类型(1商品 2文章)', type: 'integer'),
        new OA\Property(property: 'id_value', description: '关联ID(商品ID或文章ID)', type: 'integer'),
        new OA\Property(property: 'email', description: '用户邮箱', type: 'string'),
        new OA\Property(property: 'user_name', description: '用户名', type: 'string'),
        new OA\Property(property: 'content', description: '评论内容', type: 'string'),
        new OA\Property(property: 'comment_rank', description: '评论等级(1-5星)', type: 'integer'),
        new OA\Property(property: 'add_time', description: '添加时间', type: 'integer'),
        new OA\Property(property: 'ip_address', description: 'IP地址', type: 'string'),
        new OA\Property(property: 'status', description: '审核状态(0未审核 1已审核)', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父评论ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class CommentCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'comment_type' => 'require',
        'id_value' => 'require',
        'email' => 'require',
        'user_name' => 'require',
        'content' => 'require',
        'comment_rank' => 'require',
        'add_time' => 'require',
        'ip_address' => 'require',
        'status' => 'require',
        'parent_id' => 'require',
        'user_id' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置评论ID',
        'comment_type.require' => '请设置评论类型(1商品 2文章)',
        'id_value.require' => '请设置关联ID(商品ID或文章ID)',
        'email.require' => '请设置用户邮箱',
        'user_name.require' => '请设置用户名',
        'content.require' => '请设置评论内容',
        'comment_rank.require' => '请设置评论等级(1-5星)',
        'add_time.require' => '请设置添加时间',
        'ip_address.require' => '请设置IP地址',
        'status.require' => '请设置审核状态(0未审核 1已审核)',
        'parent_id.require' => '请设置父评论ID',
        'user_id.require' => '请设置用户ID',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

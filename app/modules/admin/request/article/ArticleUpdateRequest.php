<?php

declare(strict_types=1);

namespace app\modules\admin\request\article;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ArticleUpdateRequest',
    required: [
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
    ],
    properties: [
        new OA\Property(property: 'id', description: '文章ID', type: 'integer'),
        new OA\Property(property: 'cat_id', description: '分类ID', type: 'integer'),
        new OA\Property(property: 'title', description: '文章标题', type: 'string'),
        new OA\Property(property: 'content', description: '文章内容', type: 'string'),
        new OA\Property(property: 'author', description: '作者', type: 'string'),
        new OA\Property(property: 'author_email', description: '作者邮箱', type: 'string'),
        new OA\Property(property: 'keywords', description: '关键词', type: 'string'),
        new OA\Property(property: 'article_type', description: '文章类型', type: 'integer'),
        new OA\Property(property: 'is_open', description: '是否显示', type: 'integer'),
        new OA\Property(property: 'add_time', description: '添加时间', type: 'integer'),
        new OA\Property(property: 'file_url', description: '附件URL', type: 'string'),
        new OA\Property(property: 'open_type', description: '打开方式', type: 'integer'),
        new OA\Property(property: 'link', description: '外部链接', type: 'string'),
        new OA\Property(property: 'description', description: '描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ArticleUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cat_id' => 'require',
        'title' => 'require',
        'content' => 'require',
        'author' => 'require',
        'author_email' => 'require',
        'keywords' => 'require',
        'article_type' => 'require',
        'is_open' => 'require',
        'add_time' => 'require',
        'file_url' => 'require',
        'open_type' => 'require',
        'link' => 'require',
        'description' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置文章ID',
        'cat_id.require' => '请设置分类ID',
        'title.require' => '请设置文章标题',
        'content.require' => '请设置文章内容',
        'author.require' => '请设置作者',
        'author_email.require' => '请设置作者邮箱',
        'keywords.require' => '请设置关键词',
        'article_type.require' => '请设置文章类型',
        'is_open.require' => '请设置是否显示',
        'add_time.require' => '请设置添加时间',
        'file_url.require' => '请设置附件URL',
        'open_type.require' => '请设置打开方式',
        'link.require' => '请设置外部链接',
        'description.require' => '请设置描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopFriendLink;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopFriendLinkCreateRequest',
    required: [
        'id',
        'link_name',
        'link_url',
        'link_logo',
        'show_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '链接ID', type: 'integer'),
        new OA\Property(property: 'link_name', description: '链接名称', type: 'string'),
        new OA\Property(property: 'link_url', description: '链接URL', type: 'string'),
        new OA\Property(property: 'link_logo', description: '链接LOGO', type: 'string'),
        new OA\Property(property: 'show_order', description: '显示顺序', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopFriendLinkCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'link_name' => 'require',
        'link_url' => 'require',
        'link_logo' => 'require',
        'show_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置链接ID',
        'link_name.require' => '请设置链接名称',
        'link_url.require' => '请设置链接URL',
        'link_logo.require' => '请设置链接LOGO',
        'show_order.require' => '请设置显示顺序',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

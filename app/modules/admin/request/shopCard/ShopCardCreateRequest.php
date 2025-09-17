<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopCard;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopCardCreateRequest',
    required: [
        'id',
        'card_name',
        'card_img',
        'card_fee',
        'free_money',
        'card_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '卡片ID', type: 'integer'),
        new OA\Property(property: 'card_name', description: '卡片名称', type: 'string'),
        new OA\Property(property: 'card_img', description: '卡片图片路径', type: 'string'),
        new OA\Property(property: 'card_fee', description: '卡片费用', type: 'float'),
        new OA\Property(property: 'free_money', description: '卡片面值', type: 'float'),
        new OA\Property(property: 'card_desc', description: '卡片描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopCardCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'card_name' => 'require',
        'card_img' => 'require',
        'card_fee' => 'require',
        'free_money' => 'require',
        'card_desc' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置卡片ID',
        'card_name.require' => '请设置卡片名称',
        'card_img.require' => '请设置卡片图片路径',
        'card_fee.require' => '请设置卡片费用',
        'free_money.require' => '请设置卡片面值',
        'card_desc.require' => '请设置卡片描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

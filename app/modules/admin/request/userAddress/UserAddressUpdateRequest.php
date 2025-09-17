<?php

declare(strict_types=1);

namespace app\modules\admin\request\userAddress;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserAddressUpdateRequest',
    required: [
        'id',
        'address_name',
        'user_id',
        'consignee',
        'email',
        'country',
        'province',
        'city',
        'district',
        'address',
        'zipcode',
        'tel',
        'mobile',
        'sign_building',
        'best_time',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '地址ID', type: 'integer'),
        new OA\Property(property: 'address_name', description: '地址名称', type: 'string'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'consignee', description: '收货人姓名', type: 'string'),
        new OA\Property(property: 'email', description: '电子邮箱', type: 'string'),
        new OA\Property(property: 'country', description: '国家ID', type: 'integer'),
        new OA\Property(property: 'province', description: '省份ID', type: 'integer'),
        new OA\Property(property: 'city', description: '城市ID', type: 'integer'),
        new OA\Property(property: 'district', description: '区县ID', type: 'integer'),
        new OA\Property(property: 'address', description: '详细地址', type: 'string'),
        new OA\Property(property: 'zipcode', description: '邮政编码', type: 'string'),
        new OA\Property(property: 'tel', description: '固定电话', type: 'string'),
        new OA\Property(property: 'mobile', description: '手机号码', type: 'string'),
        new OA\Property(property: 'sign_building', description: '标志性建筑', type: 'string'),
        new OA\Property(property: 'best_time', description: '最佳送货时间', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserAddressUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'address_name' => 'require',
        'user_id' => 'require',
        'consignee' => 'require',
        'email' => 'require',
        'country' => 'require',
        'province' => 'require',
        'city' => 'require',
        'district' => 'require',
        'address' => 'require',
        'zipcode' => 'require',
        'tel' => 'require',
        'mobile' => 'require',
        'sign_building' => 'require',
        'best_time' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置地址ID',
        'address_name.require' => '请设置地址名称',
        'user_id.require' => '请设置用户ID',
        'consignee.require' => '请设置收货人姓名',
        'email.require' => '请设置电子邮箱',
        'country.require' => '请设置国家ID',
        'province.require' => '请设置省份ID',
        'city.require' => '请设置城市ID',
        'district.require' => '请设置区县ID',
        'address.require' => '请设置详细地址',
        'zipcode.require' => '请设置邮政编码',
        'tel.require' => '请设置固定电话',
        'mobile.require' => '请设置手机号码',
        'sign_building.require' => '请设置标志性建筑',
        'best_time.require' => '请设置最佳送货时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}

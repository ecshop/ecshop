<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ShopConfig;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ShopConfigCreateRequest',
    required: [
        self::getParentId,
        self::getCode,
        self::getType,
        self::getStoreRange,
        self::getStoreDir,
        self::getValue,
        self::getSortOrder,
    ],
    properties: [
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getCode, description: '', type: 'string'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
        new OA\Property(property: self::getStoreRange, description: '', type: 'string'),
        new OA\Property(property: self::getStoreDir, description: '', type: 'string'),
        new OA\Property(property: self::getValue, description: '', type: 'string'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
    ]
)]
class ShopConfigCreateRequest extends FormRequest
{
    const string getParentId = 'parentId';

    const string getCode = 'code';

    const string getType = 'type';

    const string getStoreRange = 'storeRange';

    const string getStoreDir = 'storeDir';

    const string getValue = 'value';

    const string getSortOrder = 'sortOrder';

    public function rules(): array
    {
        return [
            self::getParentId => 'required',
            self::getCode => 'required',
            self::getType => 'required',
            self::getStoreRange => 'required',
            self::getStoreDir => 'required',
            self::getValue => 'required',
            self::getSortOrder => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getParentId.'.required' => '请设置',
            self::getCode.'.required' => '请设置',
            self::getType.'.required' => '请设置',
            self::getStoreRange.'.required' => '请设置',
            self::getStoreDir.'.required' => '请设置',
            self::getValue.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
        ];
    }
}

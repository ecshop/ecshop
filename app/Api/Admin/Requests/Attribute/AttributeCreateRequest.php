<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AttributeCreateRequest',
    required: [
        self::getAttrId,
        self::getCatId,
        self::getAttrName,
        self::getAttrInputType,
        self::getAttrType,
        self::getAttrValues,
        self::getAttrIndex,
        self::getSortOrder,
        self::getIsLinked,
        self::getAttrGroup,
    ],
    properties: [
        new OA\Property(property: self::getAttrId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrName, description: '', type: 'string'),
        new OA\Property(property: self::getAttrInputType, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrType, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrValues, description: '', type: 'string'),
        new OA\Property(property: self::getAttrIndex, description: '', type: 'integer'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getIsLinked, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrGroup, description: '', type: 'integer'),
    ]
)]
class AttributeCreateRequest extends FormRequest
{
    const string getAttrId = 'attrId';

    const string getCatId = 'catId';

    const string getAttrName = 'attrName';

    const string getAttrInputType = 'attrInputType';

    const string getAttrType = 'attrType';

    const string getAttrValues = 'attrValues';

    const string getAttrIndex = 'attrIndex';

    const string getSortOrder = 'sortOrder';

    const string getIsLinked = 'isLinked';

    const string getAttrGroup = 'attrGroup';

    public function rules(): array
    {
        return [
            self::getAttrId => 'required',
            self::getCatId => 'required',
            self::getAttrName => 'required',
            self::getAttrInputType => 'required',
            self::getAttrType => 'required',
            self::getAttrValues => 'required',
            self::getAttrIndex => 'required',
            self::getSortOrder => 'required',
            self::getIsLinked => 'required',
            self::getAttrGroup => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getAttrId.'.required' => '请设置',
            self::getCatId.'.required' => '请设置',
            self::getAttrName.'.required' => '请设置',
            self::getAttrInputType.'.required' => '请设置',
            self::getAttrType.'.required' => '请设置',
            self::getAttrValues.'.required' => '请设置',
            self::getAttrIndex.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getIsLinked.'.required' => '请设置',
            self::getAttrGroup.'.required' => '请设置',
        ];
    }
}

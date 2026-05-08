<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsType;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsTypeUpdateRequest',
    required: [
        self::getCatId,
        self::getCatName,
        self::getEnabled,
        self::getAttrGroup,
    ],
    properties: [
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatName, description: '', type: 'string'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrGroup, description: '', type: 'string'),
    ]
)]
class GoodsTypeUpdateRequest extends FormRequest
{
    const string getCatId = 'catId';

    const string getCatName = 'catName';

    const string getEnabled = 'enabled';

    const string getAttrGroup = 'attrGroup';

    public function rules(): array
    {
        return [
            self::getCatId => 'required',
            self::getCatName => 'required',
            self::getEnabled => 'required',
            self::getAttrGroup => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCatId.'.required' => '请设置',
            self::getCatName.'.required' => '请设置',
            self::getEnabled.'.required' => '请设置',
            self::getAttrGroup.'.required' => '请设置',
        ];
    }
}

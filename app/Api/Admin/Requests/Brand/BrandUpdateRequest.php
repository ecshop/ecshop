<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BrandUpdateRequest',
    required: [
        self::getBrandId,
        self::getBrandName,
        self::getBrandLogo,
        self::getBrandDesc,
        self::getSiteUrl,
        self::getSortOrder,
        self::getIsShow,
    ],
    properties: [
        new OA\Property(property: self::getBrandId, description: '', type: 'integer'),
        new OA\Property(property: self::getBrandName, description: '', type: 'string'),
        new OA\Property(property: self::getBrandLogo, description: '', type: 'string'),
        new OA\Property(property: self::getBrandDesc, description: '', type: 'string'),
        new OA\Property(property: self::getSiteUrl, description: '', type: 'string'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getIsShow, description: '', type: 'integer'),
    ]
)]
class BrandUpdateRequest extends FormRequest
{
    const string getBrandId = 'brandId';

    const string getBrandName = 'brandName';

    const string getBrandLogo = 'brandLogo';

    const string getBrandDesc = 'brandDesc';

    const string getSiteUrl = 'siteUrl';

    const string getSortOrder = 'sortOrder';

    const string getIsShow = 'isShow';

    public function rules(): array
    {
        return [
            self::getBrandId => 'required',
            self::getBrandName => 'required',
            self::getBrandLogo => 'required',
            self::getBrandDesc => 'required',
            self::getSiteUrl => 'required',
            self::getSortOrder => 'required',
            self::getIsShow => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getBrandId.'.required' => '请设置',
            self::getBrandName.'.required' => '请设置',
            self::getBrandLogo.'.required' => '请设置',
            self::getBrandDesc.'.required' => '请设置',
            self::getSiteUrl.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getIsShow.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ArticleCat;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ArticleCatCreateRequest',
    required: [
        self::getCatId,
        self::getCatName,
        self::getCatType,
        self::getKeywords,
        self::getCatDesc,
        self::getSortOrder,
        self::getShowInNav,
        self::getParentId,
    ],
    properties: [
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatName, description: '', type: 'string'),
        new OA\Property(property: self::getCatType, description: '', type: 'integer'),
        new OA\Property(property: self::getKeywords, description: '', type: 'string'),
        new OA\Property(property: self::getCatDesc, description: '', type: 'string'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getShowInNav, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
    ]
)]
class ArticleCatCreateRequest extends FormRequest
{
    const string getCatId = 'catId';

    const string getCatName = 'catName';

    const string getCatType = 'catType';

    const string getKeywords = 'keywords';

    const string getCatDesc = 'catDesc';

    const string getSortOrder = 'sortOrder';

    const string getShowInNav = 'showInNav';

    const string getParentId = 'parentId';

    public function rules(): array
    {
        return [
            self::getCatId => 'required',
            self::getCatName => 'required',
            self::getCatType => 'required',
            self::getKeywords => 'required',
            self::getCatDesc => 'required',
            self::getSortOrder => 'required',
            self::getShowInNav => 'required',
            self::getParentId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCatId.'.required' => '请设置',
            self::getCatName.'.required' => '请设置',
            self::getCatType.'.required' => '请设置',
            self::getKeywords.'.required' => '请设置',
            self::getCatDesc.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getShowInNav.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
        ];
    }
}

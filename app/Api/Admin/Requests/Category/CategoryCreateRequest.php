<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CategoryCreateRequest',
    required: [
        self::getCatId,
        self::getCatName,
        self::getKeywords,
        self::getCatDesc,
        self::getParentId,
        self::getSortOrder,
        self::getTemplateFile,
        self::getMeasureUnit,
        self::getShowInNav,
        self::getStyle,
        self::getIsShow,
        self::getGrade,
        self::getFilterAttr,
    ],
    properties: [
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatName, description: '', type: 'string'),
        new OA\Property(property: self::getKeywords, description: '', type: 'string'),
        new OA\Property(property: self::getCatDesc, description: '', type: 'string'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getTemplateFile, description: '', type: 'string'),
        new OA\Property(property: self::getMeasureUnit, description: '', type: 'string'),
        new OA\Property(property: self::getShowInNav, description: '', type: 'integer'),
        new OA\Property(property: self::getStyle, description: '', type: 'string'),
        new OA\Property(property: self::getIsShow, description: '', type: 'integer'),
        new OA\Property(property: self::getGrade, description: '', type: 'integer'),
        new OA\Property(property: self::getFilterAttr, description: '', type: 'string'),
    ]
)]
class CategoryCreateRequest extends FormRequest
{
    const string getCatId = 'catId';

    const string getCatName = 'catName';

    const string getKeywords = 'keywords';

    const string getCatDesc = 'catDesc';

    const string getParentId = 'parentId';

    const string getSortOrder = 'sortOrder';

    const string getTemplateFile = 'templateFile';

    const string getMeasureUnit = 'measureUnit';

    const string getShowInNav = 'showInNav';

    const string getStyle = 'style';

    const string getIsShow = 'isShow';

    const string getGrade = 'grade';

    const string getFilterAttr = 'filterAttr';

    public function rules(): array
    {
        return [
            self::getCatId => 'required',
            self::getCatName => 'required',
            self::getKeywords => 'required',
            self::getCatDesc => 'required',
            self::getParentId => 'required',
            self::getSortOrder => 'required',
            self::getTemplateFile => 'required',
            self::getMeasureUnit => 'required',
            self::getShowInNav => 'required',
            self::getStyle => 'required',
            self::getIsShow => 'required',
            self::getGrade => 'required',
            self::getFilterAttr => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCatId.'.required' => '请设置',
            self::getCatName.'.required' => '请设置',
            self::getKeywords.'.required' => '请设置',
            self::getCatDesc.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getTemplateFile.'.required' => '请设置',
            self::getMeasureUnit.'.required' => '请设置',
            self::getShowInNav.'.required' => '请设置',
            self::getStyle.'.required' => '请设置',
            self::getIsShow.'.required' => '请设置',
            self::getGrade.'.required' => '请设置',
            self::getFilterAttr.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TagCreateRequest',
    required: [
        self::getTagId,
        self::getUserId,
        self::getGoodsId,
        self::getTagWords,
    ],
    properties: [
        new OA\Property(property: self::getTagId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getTagWords, description: '', type: 'string'),
    ]
)]
class TagCreateRequest extends FormRequest
{
    const string getTagId = 'tagId';

    const string getUserId = 'userId';

    const string getGoodsId = 'goodsId';

    const string getTagWords = 'tagWords';

    public function rules(): array
    {
        return [
            self::getTagId => 'required',
            self::getUserId => 'required',
            self::getGoodsId => 'required',
            self::getTagWords => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getTagId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getTagWords.'.required' => '请设置',
        ];
    }
}

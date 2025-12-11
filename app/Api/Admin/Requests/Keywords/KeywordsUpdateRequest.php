<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Keywords;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'KeywordsUpdateRequest',
    required: [
        self::getId,
        self::getDate,
        self::getSearchengine,
        self::getKeyword,
        self::getCount,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getDate, description: '', type: 'string'),
        new OA\Property(property: self::getSearchengine, description: '', type: 'string'),
        new OA\Property(property: self::getKeyword, description: '', type: 'string'),
        new OA\Property(property: self::getCount, description: '', type: 'integer'),
    ]
)]
class KeywordsUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getDate = 'date';

    const string getSearchengine = 'searchengine';

    const string getKeyword = 'keyword';

    const string getCount = 'count';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getDate => 'required',
            self::getSearchengine => 'required',
            self::getKeyword => 'required',
            self::getCount => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getDate.'.required' => '请设置',
            self::getSearchengine.'.required' => '请设置',
            self::getKeyword.'.required' => '请设置',
            self::getCount.'.required' => '请设置',
        ];
    }
}

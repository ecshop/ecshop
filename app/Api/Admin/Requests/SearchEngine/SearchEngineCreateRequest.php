<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\SearchEngine;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SearchEngineCreateRequest',
    required: [
        self::getDate,
        self::getSearchengine,
        self::getCount,
    ],
    properties: [
        new OA\Property(property: self::getDate, description: '', type: 'string'),
        new OA\Property(property: self::getSearchengine, description: '', type: 'string'),
        new OA\Property(property: self::getCount, description: '', type: 'integer'),
    ]
)]
class SearchEngineCreateRequest extends FormRequest
{
    const string getDate = 'date';

    const string getSearchengine = 'searchengine';

    const string getCount = 'count';

    public function rules(): array
    {
        return [
            self::getDate => 'required',
            self::getSearchengine => 'required',
            self::getCount => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getDate.'.required' => '请设置',
            self::getSearchengine.'.required' => '请设置',
            self::getCount.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Adsense;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdsenseUpdateRequest',
    required: [
        self::getId,
        self::getFromAd,
        self::getReferer,
        self::getClicks,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getFromAd, description: '', type: 'integer'),
        new OA\Property(property: self::getReferer, description: '', type: 'string'),
        new OA\Property(property: self::getClicks, description: '', type: 'integer'),
    ]
)]
class AdsenseUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getFromAd = 'fromAd';

    const string getReferer = 'referer';

    const string getClicks = 'clicks';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getFromAd => 'required',
            self::getReferer => 'required',
            self::getClicks => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getFromAd.'.required' => '请设置',
            self::getReferer.'.required' => '请设置',
            self::getClicks.'.required' => '请设置',
        ];
    }
}

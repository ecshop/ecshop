<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdCustom;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdCustomCreateRequest',
    required: [
        self::getAdId,
        self::getAdType,
        self::getAdName,
        self::getAddTime,
        self::getContent,
        self::getUrl,
        self::getAdStatus,
    ],
    properties: [
        new OA\Property(property: self::getAdId, description: '', type: 'integer'),
        new OA\Property(property: self::getAdType, description: '', type: 'integer'),
        new OA\Property(property: self::getAdName, description: '', type: 'string'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getContent, description: '', type: 'string'),
        new OA\Property(property: self::getUrl, description: '', type: 'string'),
        new OA\Property(property: self::getAdStatus, description: '', type: 'integer'),
    ]
)]
class AdCustomCreateRequest extends FormRequest
{
    const string getAdId = 'adId';

    const string getAdType = 'adType';

    const string getAdName = 'adName';

    const string getAddTime = 'addTime';

    const string getContent = 'content';

    const string getUrl = 'url';

    const string getAdStatus = 'adStatus';

    public function rules(): array
    {
        return [
            self::getAdId => 'required',
            self::getAdType => 'required',
            self::getAdName => 'required',
            self::getAddTime => 'required',
            self::getContent => 'required',
            self::getUrl => 'required',
            self::getAdStatus => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getAdId.'.required' => '请设置',
            self::getAdType.'.required' => '请设置',
            self::getAdName.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getContent.'.required' => '请设置',
            self::getUrl.'.required' => '请设置',
            self::getAdStatus.'.required' => '请设置',
        ];
    }
}

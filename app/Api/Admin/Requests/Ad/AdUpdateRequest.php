<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdUpdateRequest',
    required: [
        self::getAdId,
        self::getPositionId,
        self::getMediaType,
        self::getAdName,
        self::getAdLink,
        self::getAdCode,
        self::getStartTime,
        self::getEndTime,
        self::getLinkMan,
        self::getLinkEmail,
        self::getLinkPhone,
        self::getClickCount,
        self::getEnabled,
    ],
    properties: [
        new OA\Property(property: self::getAdId, description: '', type: 'integer'),
        new OA\Property(property: self::getPositionId, description: '', type: 'integer'),
        new OA\Property(property: self::getMediaType, description: '', type: 'integer'),
        new OA\Property(property: self::getAdName, description: '', type: 'string'),
        new OA\Property(property: self::getAdLink, description: '', type: 'string'),
        new OA\Property(property: self::getAdCode, description: '', type: 'string'),
        new OA\Property(property: self::getStartTime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndTime, description: '', type: 'integer'),
        new OA\Property(property: self::getLinkMan, description: '', type: 'string'),
        new OA\Property(property: self::getLinkEmail, description: '', type: 'string'),
        new OA\Property(property: self::getLinkPhone, description: '', type: 'string'),
        new OA\Property(property: self::getClickCount, description: '', type: 'integer'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
    ]
)]
class AdUpdateRequest extends FormRequest
{
    const string getAdId = 'adId';

    const string getPositionId = 'positionId';

    const string getMediaType = 'mediaType';

    const string getAdName = 'adName';

    const string getAdLink = 'adLink';

    const string getAdCode = 'adCode';

    const string getStartTime = 'startTime';

    const string getEndTime = 'endTime';

    const string getLinkMan = 'linkMan';

    const string getLinkEmail = 'linkEmail';

    const string getLinkPhone = 'linkPhone';

    const string getClickCount = 'clickCount';

    const string getEnabled = 'enabled';

    public function rules(): array
    {
        return [
            self::getAdId => 'required',
            self::getPositionId => 'required',
            self::getMediaType => 'required',
            self::getAdName => 'required',
            self::getAdLink => 'required',
            self::getAdCode => 'required',
            self::getStartTime => 'required',
            self::getEndTime => 'required',
            self::getLinkMan => 'required',
            self::getLinkEmail => 'required',
            self::getLinkPhone => 'required',
            self::getClickCount => 'required',
            self::getEnabled => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getAdId.'.required' => '请设置',
            self::getPositionId.'.required' => '请设置',
            self::getMediaType.'.required' => '请设置',
            self::getAdName.'.required' => '请设置',
            self::getAdLink.'.required' => '请设置',
            self::getAdCode.'.required' => '请设置',
            self::getStartTime.'.required' => '请设置',
            self::getEndTime.'.required' => '请设置',
            self::getLinkMan.'.required' => '请设置',
            self::getLinkEmail.'.required' => '请设置',
            self::getLinkPhone.'.required' => '请设置',
            self::getClickCount.'.required' => '请设置',
            self::getEnabled.'.required' => '请设置',
        ];
    }
}

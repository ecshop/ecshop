<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Stats;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'StatsUpdateRequest',
    required: [
        self::getId,
        self::getAccessTime,
        self::getIpAddress,
        self::getVisitTimes,
        self::getBrowser,
        self::getSystem,
        self::getLanguage,
        self::getArea,
        self::getRefererDomain,
        self::getRefererPath,
        self::getAccessUrl,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getAccessTime, description: '', type: 'integer'),
        new OA\Property(property: self::getIpAddress, description: '', type: 'string'),
        new OA\Property(property: self::getVisitTimes, description: '', type: 'integer'),
        new OA\Property(property: self::getBrowser, description: '', type: 'string'),
        new OA\Property(property: self::getSystem, description: '', type: 'string'),
        new OA\Property(property: self::getLanguage, description: '', type: 'string'),
        new OA\Property(property: self::getArea, description: '', type: 'string'),
        new OA\Property(property: self::getRefererDomain, description: '', type: 'string'),
        new OA\Property(property: self::getRefererPath, description: '', type: 'string'),
        new OA\Property(property: self::getAccessUrl, description: '', type: 'string'),
    ]
)]
class StatsUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getAccessTime = 'accessTime';

    const string getIpAddress = 'ipAddress';

    const string getVisitTimes = 'visitTimes';

    const string getBrowser = 'browser';

    const string getSystem = 'system';

    const string getLanguage = 'language';

    const string getArea = 'area';

    const string getRefererDomain = 'refererDomain';

    const string getRefererPath = 'refererPath';

    const string getAccessUrl = 'accessUrl';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getAccessTime => 'required',
            self::getIpAddress => 'required',
            self::getVisitTimes => 'required',
            self::getBrowser => 'required',
            self::getSystem => 'required',
            self::getLanguage => 'required',
            self::getArea => 'required',
            self::getRefererDomain => 'required',
            self::getRefererPath => 'required',
            self::getAccessUrl => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getAccessTime.'.required' => '请设置',
            self::getIpAddress.'.required' => '请设置',
            self::getVisitTimes.'.required' => '请设置',
            self::getBrowser.'.required' => '请设置',
            self::getSystem.'.required' => '请设置',
            self::getLanguage.'.required' => '请设置',
            self::getArea.'.required' => '请设置',
            self::getRefererDomain.'.required' => '请设置',
            self::getRefererPath.'.required' => '请设置',
            self::getAccessUrl.'.required' => '请设置',
        ];
    }
}

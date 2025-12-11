<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Crons;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CronsCreateRequest',
    required: [
        self::getCronId,
        self::getCronCode,
        self::getCronName,
        self::getCronDesc,
        self::getCronOrder,
        self::getCronConfig,
        self::getThistime,
        self::getNextime,
        self::getDay,
        self::getWeek,
        self::getHour,
        self::getMinute,
        self::getEnable,
        self::getRunOnce,
        self::getAllowIp,
        self::getAlowFiles,
    ],
    properties: [
        new OA\Property(property: self::getCronId, description: '', type: 'integer'),
        new OA\Property(property: self::getCronCode, description: '', type: 'string'),
        new OA\Property(property: self::getCronName, description: '', type: 'string'),
        new OA\Property(property: self::getCronDesc, description: '', type: 'string'),
        new OA\Property(property: self::getCronOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getCronConfig, description: '', type: 'string'),
        new OA\Property(property: self::getThistime, description: '', type: 'integer'),
        new OA\Property(property: self::getNextime, description: '', type: 'integer'),
        new OA\Property(property: self::getDay, description: '', type: 'integer'),
        new OA\Property(property: self::getWeek, description: '', type: 'string'),
        new OA\Property(property: self::getHour, description: '', type: 'string'),
        new OA\Property(property: self::getMinute, description: '', type: 'string'),
        new OA\Property(property: self::getEnable, description: '', type: 'integer'),
        new OA\Property(property: self::getRunOnce, description: '', type: 'integer'),
        new OA\Property(property: self::getAllowIp, description: '', type: 'string'),
        new OA\Property(property: self::getAlowFiles, description: '', type: 'string'),
    ]
)]
class CronsCreateRequest extends FormRequest
{
    const string getCronId = 'cronId';

    const string getCronCode = 'cronCode';

    const string getCronName = 'cronName';

    const string getCronDesc = 'cronDesc';

    const string getCronOrder = 'cronOrder';

    const string getCronConfig = 'cronConfig';

    const string getThistime = 'thistime';

    const string getNextime = 'nextime';

    const string getDay = 'day';

    const string getWeek = 'week';

    const string getHour = 'hour';

    const string getMinute = 'minute';

    const string getEnable = 'enable';

    const string getRunOnce = 'runOnce';

    const string getAllowIp = 'allowIp';

    const string getAlowFiles = 'alowFiles';

    public function rules(): array
    {
        return [
            self::getCronId => 'required',
            self::getCronCode => 'required',
            self::getCronName => 'required',
            self::getCronDesc => 'required',
            self::getCronOrder => 'required',
            self::getCronConfig => 'required',
            self::getThistime => 'required',
            self::getNextime => 'required',
            self::getDay => 'required',
            self::getWeek => 'required',
            self::getHour => 'required',
            self::getMinute => 'required',
            self::getEnable => 'required',
            self::getRunOnce => 'required',
            self::getAllowIp => 'required',
            self::getAlowFiles => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCronId.'.required' => '请设置',
            self::getCronCode.'.required' => '请设置',
            self::getCronName.'.required' => '请设置',
            self::getCronDesc.'.required' => '请设置',
            self::getCronOrder.'.required' => '请设置',
            self::getCronConfig.'.required' => '请设置',
            self::getThistime.'.required' => '请设置',
            self::getNextime.'.required' => '请设置',
            self::getDay.'.required' => '请设置',
            self::getWeek.'.required' => '请设置',
            self::getHour.'.required' => '请设置',
            self::getMinute.'.required' => '请设置',
            self::getEnable.'.required' => '请设置',
            self::getRunOnce.'.required' => '请设置',
            self::getAllowIp.'.required' => '请设置',
            self::getAlowFiles.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Nav;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'NavUpdateRequest',
    required: [
        self::getId,
        self::getCtype,
        self::getCid,
        self::getName,
        self::getIfshow,
        self::getVieworder,
        self::getOpennew,
        self::getUrl,
        self::getType,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getCtype, description: '', type: 'string'),
        new OA\Property(property: self::getCid, description: '', type: 'integer'),
        new OA\Property(property: self::getName, description: '', type: 'string'),
        new OA\Property(property: self::getIfshow, description: '', type: 'integer'),
        new OA\Property(property: self::getVieworder, description: '', type: 'integer'),
        new OA\Property(property: self::getOpennew, description: '', type: 'integer'),
        new OA\Property(property: self::getUrl, description: '', type: 'string'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
    ]
)]
class NavUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getCtype = 'ctype';

    const string getCid = 'cid';

    const string getName = 'name';

    const string getIfshow = 'ifshow';

    const string getVieworder = 'vieworder';

    const string getOpennew = 'opennew';

    const string getUrl = 'url';

    const string getType = 'type';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getCtype => 'required',
            self::getCid => 'required',
            self::getName => 'required',
            self::getIfshow => 'required',
            self::getVieworder => 'required',
            self::getOpennew => 'required',
            self::getUrl => 'required',
            self::getType => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getCtype.'.required' => '请设置',
            self::getCid.'.required' => '请设置',
            self::getName.'.required' => '请设置',
            self::getIfshow.'.required' => '请设置',
            self::getVieworder.'.required' => '请设置',
            self::getOpennew.'.required' => '请设置',
            self::getUrl.'.required' => '请设置',
            self::getType.'.required' => '请设置',
        ];
    }
}

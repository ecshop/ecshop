<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserAddress;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserAddressUpdateRequest',
    required: [
        self::getAddressId,
        self::getAddressName,
        self::getUserId,
        self::getConsignee,
        self::getEmail,
        self::getCountry,
        self::getProvince,
        self::getCity,
        self::getDistrict,
        self::getAddress,
        self::getZipcode,
        self::getTel,
        self::getMobile,
        self::getSignBuilding,
        self::getBestTime,
    ],
    properties: [
        new OA\Property(property: self::getAddressId, description: '', type: 'integer'),
        new OA\Property(property: self::getAddressName, description: '', type: 'string'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getConsignee, description: '', type: 'string'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getCountry, description: '', type: 'integer'),
        new OA\Property(property: self::getProvince, description: '', type: 'integer'),
        new OA\Property(property: self::getCity, description: '', type: 'integer'),
        new OA\Property(property: self::getDistrict, description: '', type: 'integer'),
        new OA\Property(property: self::getAddress, description: '', type: 'string'),
        new OA\Property(property: self::getZipcode, description: '', type: 'string'),
        new OA\Property(property: self::getTel, description: '', type: 'string'),
        new OA\Property(property: self::getMobile, description: '', type: 'string'),
        new OA\Property(property: self::getSignBuilding, description: '', type: 'string'),
        new OA\Property(property: self::getBestTime, description: '', type: 'string'),
    ]
)]
class UserAddressUpdateRequest extends FormRequest
{
    const string getAddressId = 'addressId';

    const string getAddressName = 'addressName';

    const string getUserId = 'userId';

    const string getConsignee = 'consignee';

    const string getEmail = 'email';

    const string getCountry = 'country';

    const string getProvince = 'province';

    const string getCity = 'city';

    const string getDistrict = 'district';

    const string getAddress = 'address';

    const string getZipcode = 'zipcode';

    const string getTel = 'tel';

    const string getMobile = 'mobile';

    const string getSignBuilding = 'signBuilding';

    const string getBestTime = 'bestTime';

    public function rules(): array
    {
        return [
            self::getAddressId => 'required',
            self::getAddressName => 'required',
            self::getUserId => 'required',
            self::getConsignee => 'required',
            self::getEmail => 'required',
            self::getCountry => 'required',
            self::getProvince => 'required',
            self::getCity => 'required',
            self::getDistrict => 'required',
            self::getAddress => 'required',
            self::getZipcode => 'required',
            self::getTel => 'required',
            self::getMobile => 'required',
            self::getSignBuilding => 'required',
            self::getBestTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getAddressId.'.required' => '请设置',
            self::getAddressName.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getConsignee.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getCountry.'.required' => '请设置',
            self::getProvince.'.required' => '请设置',
            self::getCity.'.required' => '请设置',
            self::getDistrict.'.required' => '请设置',
            self::getAddress.'.required' => '请设置',
            self::getZipcode.'.required' => '请设置',
            self::getTel.'.required' => '请设置',
            self::getMobile.'.required' => '请设置',
            self::getSignBuilding.'.required' => '请设置',
            self::getBestTime.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\BookingGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BookingGoodsCreateRequest',
    required: [
        self::getRecId,
        self::getUserId,
        self::getEmail,
        self::getLinkMan,
        self::getTel,
        self::getGoodsId,
        self::getGoodsDesc,
        self::getGoodsNumber,
        self::getBookingTime,
        self::getIsDispose,
        self::getDisposeUser,
        self::getDisposeTime,
        self::getDisposeNote,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getLinkMan, description: '', type: 'string'),
        new OA\Property(property: self::getTel, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsDesc, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getBookingTime, description: '', type: 'integer'),
        new OA\Property(property: self::getIsDispose, description: '', type: 'integer'),
        new OA\Property(property: self::getDisposeUser, description: '', type: 'string'),
        new OA\Property(property: self::getDisposeTime, description: '', type: 'integer'),
        new OA\Property(property: self::getDisposeNote, description: '', type: 'string'),
    ]
)]
class BookingGoodsCreateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getUserId = 'userId';

    const string getEmail = 'email';

    const string getLinkMan = 'linkMan';

    const string getTel = 'tel';

    const string getGoodsId = 'goodsId';

    const string getGoodsDesc = 'goodsDesc';

    const string getGoodsNumber = 'goodsNumber';

    const string getBookingTime = 'bookingTime';

    const string getIsDispose = 'isDispose';

    const string getDisposeUser = 'disposeUser';

    const string getDisposeTime = 'disposeTime';

    const string getDisposeNote = 'disposeNote';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getUserId => 'required',
            self::getEmail => 'required',
            self::getLinkMan => 'required',
            self::getTel => 'required',
            self::getGoodsId => 'required',
            self::getGoodsDesc => 'required',
            self::getGoodsNumber => 'required',
            self::getBookingTime => 'required',
            self::getIsDispose => 'required',
            self::getDisposeUser => 'required',
            self::getDisposeTime => 'required',
            self::getDisposeNote => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getLinkMan.'.required' => '请设置',
            self::getTel.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsDesc.'.required' => '请设置',
            self::getGoodsNumber.'.required' => '请设置',
            self::getBookingTime.'.required' => '请设置',
            self::getIsDispose.'.required' => '请设置',
            self::getDisposeUser.'.required' => '请设置',
            self::getDisposeTime.'.required' => '请设置',
            self::getDisposeNote.'.required' => '请设置',
        ];
    }
}

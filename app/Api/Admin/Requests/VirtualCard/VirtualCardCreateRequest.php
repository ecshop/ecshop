<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VirtualCard;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VirtualCardCreateRequest',
    required: [
        self::getCardId,
        self::getGoodsId,
        self::getCardSn,
        self::getCardPassword,
        self::getAddDate,
        self::getEndDate,
        self::getIsSaled,
        self::getOrderSn,
        self::getCrc32,
    ],
    properties: [
        new OA\Property(property: self::getCardId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getCardSn, description: '', type: 'string'),
        new OA\Property(property: self::getCardPassword, description: '', type: 'string'),
        new OA\Property(property: self::getAddDate, description: '', type: 'integer'),
        new OA\Property(property: self::getEndDate, description: '', type: 'integer'),
        new OA\Property(property: self::getIsSaled, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderSn, description: '', type: 'string'),
        new OA\Property(property: self::getCrc32, description: '', type: 'string'),
    ]
)]
class VirtualCardCreateRequest extends FormRequest
{
    const string getCardId = 'cardId';

    const string getGoodsId = 'goodsId';

    const string getCardSn = 'cardSn';

    const string getCardPassword = 'cardPassword';

    const string getAddDate = 'addDate';

    const string getEndDate = 'endDate';

    const string getIsSaled = 'isSaled';

    const string getOrderSn = 'orderSn';

    const string getCrc32 = 'crc32';

    public function rules(): array
    {
        return [
            self::getCardId => 'required',
            self::getGoodsId => 'required',
            self::getCardSn => 'required',
            self::getCardPassword => 'required',
            self::getAddDate => 'required',
            self::getEndDate => 'required',
            self::getIsSaled => 'required',
            self::getOrderSn => 'required',
            self::getCrc32 => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCardId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getCardSn.'.required' => '请设置',
            self::getCardPassword.'.required' => '请设置',
            self::getAddDate.'.required' => '请设置',
            self::getEndDate.'.required' => '请设置',
            self::getIsSaled.'.required' => '请设置',
            self::getOrderSn.'.required' => '请设置',
            self::getCrc32.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CardCreateRequest',
    required: [
        self::getCardId,
        self::getCardName,
        self::getCardImg,
        self::getCardFee,
        self::getFreeMoney,
        self::getCardDesc,
    ],
    properties: [
        new OA\Property(property: self::getCardId, description: '', type: 'integer'),
        new OA\Property(property: self::getCardName, description: '', type: 'string'),
        new OA\Property(property: self::getCardImg, description: '', type: 'string'),
        new OA\Property(property: self::getCardFee, description: '', type: 'string'),
        new OA\Property(property: self::getFreeMoney, description: '', type: 'string'),
        new OA\Property(property: self::getCardDesc, description: '', type: 'string'),
    ]
)]
class CardCreateRequest extends FormRequest
{
    const string getCardId = 'cardId';

    const string getCardName = 'cardName';

    const string getCardImg = 'cardImg';

    const string getCardFee = 'cardFee';

    const string getFreeMoney = 'freeMoney';

    const string getCardDesc = 'cardDesc';

    public function rules(): array
    {
        return [
            self::getCardId => 'required',
            self::getCardName => 'required',
            self::getCardImg => 'required',
            self::getCardFee => 'required',
            self::getFreeMoney => 'required',
            self::getCardDesc => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCardId.'.required' => '请设置',
            self::getCardName.'.required' => '请设置',
            self::getCardImg.'.required' => '请设置',
            self::getCardFee.'.required' => '请设置',
            self::getFreeMoney.'.required' => '请设置',
            self::getCardDesc.'.required' => '请设置',
        ];
    }
}

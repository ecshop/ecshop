<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Pack;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PackUpdateRequest',
    required: [
        self::getPackId,
        self::getPackName,
        self::getPackImg,
        self::getPackFee,
        self::getFreeMoney,
        self::getPackDesc,
    ],
    properties: [
        new OA\Property(property: self::getPackId, description: '', type: 'integer'),
        new OA\Property(property: self::getPackName, description: '', type: 'string'),
        new OA\Property(property: self::getPackImg, description: '', type: 'string'),
        new OA\Property(property: self::getPackFee, description: '', type: 'string'),
        new OA\Property(property: self::getFreeMoney, description: '', type: 'integer'),
        new OA\Property(property: self::getPackDesc, description: '', type: 'string'),
    ]
)]
class PackUpdateRequest extends FormRequest
{
    const string getPackId = 'packId';

    const string getPackName = 'packName';

    const string getPackImg = 'packImg';

    const string getPackFee = 'packFee';

    const string getFreeMoney = 'freeMoney';

    const string getPackDesc = 'packDesc';

    public function rules(): array
    {
        return [
            self::getPackId => 'required',
            self::getPackName => 'required',
            self::getPackImg => 'required',
            self::getPackFee => 'required',
            self::getFreeMoney => 'required',
            self::getPackDesc => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPackId.'.required' => '请设置',
            self::getPackName.'.required' => '请设置',
            self::getPackImg.'.required' => '请设置',
            self::getPackFee.'.required' => '请设置',
            self::getFreeMoney.'.required' => '请设置',
            self::getPackDesc.'.required' => '请设置',
        ];
    }
}

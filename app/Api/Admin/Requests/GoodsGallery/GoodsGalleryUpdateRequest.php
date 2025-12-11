<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsGallery;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsGalleryUpdateRequest',
    required: [
        self::getImgId,
        self::getGoodsId,
        self::getImgUrl,
        self::getImgDesc,
        self::getThumbUrl,
        self::getImgOriginal,
    ],
    properties: [
        new OA\Property(property: self::getImgId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getImgUrl, description: '', type: 'string'),
        new OA\Property(property: self::getImgDesc, description: '', type: 'string'),
        new OA\Property(property: self::getThumbUrl, description: '', type: 'string'),
        new OA\Property(property: self::getImgOriginal, description: '', type: 'string'),
    ]
)]
class GoodsGalleryUpdateRequest extends FormRequest
{
    const string getImgId = 'imgId';

    const string getGoodsId = 'goodsId';

    const string getImgUrl = 'imgUrl';

    const string getImgDesc = 'imgDesc';

    const string getThumbUrl = 'thumbUrl';

    const string getImgOriginal = 'imgOriginal';

    public function rules(): array
    {
        return [
            self::getImgId => 'required',
            self::getGoodsId => 'required',
            self::getImgUrl => 'required',
            self::getImgDesc => 'required',
            self::getThumbUrl => 'required',
            self::getImgOriginal => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getImgId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getImgUrl.'.required' => '请设置',
            self::getImgDesc.'.required' => '请设置',
            self::getThumbUrl.'.required' => '请设置',
            self::getImgOriginal.'.required' => '请设置',
        ];
    }
}

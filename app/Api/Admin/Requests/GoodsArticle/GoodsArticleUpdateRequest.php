<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsArticle;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsArticleUpdateRequest',
    required: [
        self::getId,
        self::getGoodsId,
        self::getArticleId,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getArticleId, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class GoodsArticleUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getGoodsId = 'goodsId';

    const string getArticleId = 'articleId';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getGoodsId => 'required',
            self::getArticleId => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getGoodsId.'.required' => '请设置',
            self::getArticleId.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}

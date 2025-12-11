<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsArticle;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsArticleCreateRequest',
    required: [
        self::getGoodsId,
        self::getArticleId,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getArticleId, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class GoodsArticleCreateRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getArticleId = 'articleId';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getGoodsId => 'required',
            self::getArticleId => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsId.'.required' => '请设置',
            self::getArticleId.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}

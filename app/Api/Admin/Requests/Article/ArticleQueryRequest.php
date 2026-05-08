<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ArticleQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getArticleId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
    ]
)]
class ArticleQueryRequest extends FormRequest
{
    const string getArticleId = 'articleId';

    const string getCatId = 'catId';

    public function rules(): array
    {
        return [
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}

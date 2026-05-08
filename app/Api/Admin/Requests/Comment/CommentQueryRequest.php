<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CommentQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCommentId, description: '', type: 'integer'),
        new OA\Property(property: self::getIdValue, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
    ]
)]
class CommentQueryRequest extends FormRequest
{
    const string getCommentId = 'commentId';

    const string getIdValue = 'idValue';

    const string getParentId = 'parentId';

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

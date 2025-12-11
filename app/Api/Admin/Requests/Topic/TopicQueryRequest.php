<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TopicQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getTopicId, description: '', type: 'integer'),
    ]
)]
class TopicQueryRequest extends FormRequest
{
    const string getTopicId = 'topicId';

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

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\FriendLink;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FriendLinkQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLinkId, description: '', type: 'integer'),
        new OA\Property(property: self::getShowOrder, description: '', type: 'integer'),
    ]
)]
class FriendLinkQueryRequest extends FormRequest
{
    const string getLinkId = 'linkId';

    const string getShowOrder = 'showOrder';

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

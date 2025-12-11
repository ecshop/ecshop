<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\FriendLink;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FriendLinkUpdateRequest',
    required: [
        self::getLinkId,
        self::getLinkName,
        self::getLinkUrl,
        self::getLinkLogo,
        self::getShowOrder,
    ],
    properties: [
        new OA\Property(property: self::getLinkId, description: '', type: 'integer'),
        new OA\Property(property: self::getLinkName, description: '', type: 'string'),
        new OA\Property(property: self::getLinkUrl, description: '', type: 'string'),
        new OA\Property(property: self::getLinkLogo, description: '', type: 'string'),
        new OA\Property(property: self::getShowOrder, description: '', type: 'integer'),
    ]
)]
class FriendLinkUpdateRequest extends FormRequest
{
    const string getLinkId = 'linkId';

    const string getLinkName = 'linkName';

    const string getLinkUrl = 'linkUrl';

    const string getLinkLogo = 'linkLogo';

    const string getShowOrder = 'showOrder';

    public function rules(): array
    {
        return [
            self::getLinkId => 'required',
            self::getLinkName => 'required',
            self::getLinkUrl => 'required',
            self::getLinkLogo => 'required',
            self::getShowOrder => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLinkId.'.required' => '请设置',
            self::getLinkName.'.required' => '请设置',
            self::getLinkUrl.'.required' => '请设置',
            self::getLinkLogo.'.required' => '请设置',
            self::getShowOrder.'.required' => '请设置',
        ];
    }
}

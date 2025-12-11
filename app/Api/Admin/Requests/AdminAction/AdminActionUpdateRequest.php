<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminAction;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminActionUpdateRequest',
    required: [
        self::getActionId,
        self::getParentId,
        self::getActionCode,
        self::getRelevance,
    ],
    properties: [
        new OA\Property(property: self::getActionId, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getActionCode, description: '', type: 'string'),
        new OA\Property(property: self::getRelevance, description: '', type: 'string'),
    ]
)]
class AdminActionUpdateRequest extends FormRequest
{
    const string getActionId = 'actionId';

    const string getParentId = 'parentId';

    const string getActionCode = 'actionCode';

    const string getRelevance = 'relevance';

    public function rules(): array
    {
        return [
            self::getActionId => 'required',
            self::getParentId => 'required',
            self::getActionCode => 'required',
            self::getRelevance => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getActionId.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getActionCode.'.required' => '请设置',
            self::getRelevance.'.required' => '请设置',
        ];
    }
}

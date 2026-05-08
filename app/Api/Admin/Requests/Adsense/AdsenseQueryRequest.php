<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Adsense;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdsenseQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getFromAd, description: '', type: 'integer'),
    ]
)]
class AdsenseQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getFromAd = 'fromAd';

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

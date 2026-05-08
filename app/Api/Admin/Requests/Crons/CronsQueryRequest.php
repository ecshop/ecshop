<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Crons;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CronsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCronId, description: '', type: 'integer'),
        new OA\Property(property: self::getCronCode, description: '', type: 'string'),
        new OA\Property(property: self::getNextime, description: '', type: 'integer'),
        new OA\Property(property: self::getEnable, description: '', type: 'integer'),
    ]
)]
class CronsQueryRequest extends FormRequest
{
    const string getCronId = 'cronId';

    const string getCronCode = 'cronCode';

    const string getNextime = 'nextime';

    const string getEnable = 'enable';

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

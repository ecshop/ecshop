<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SupplierCreateRequest',
    required: [
        self::getSuppliersId,
        self::getSuppliersName,
        self::getSuppliersDesc,
        self::getIsCheck,
    ],
    properties: [
        new OA\Property(property: self::getSuppliersId, description: '', type: 'integer'),
        new OA\Property(property: self::getSuppliersName, description: '', type: 'string'),
        new OA\Property(property: self::getSuppliersDesc, description: '', type: 'string'),
        new OA\Property(property: self::getIsCheck, description: '', type: 'integer'),
    ]
)]
class SupplierCreateRequest extends FormRequest
{
    const string getSuppliersId = 'suppliersId';

    const string getSuppliersName = 'suppliersName';

    const string getSuppliersDesc = 'suppliersDesc';

    const string getIsCheck = 'isCheck';

    public function rules(): array
    {
        return [
            self::getSuppliersId => 'required',
            self::getSuppliersName => 'required',
            self::getSuppliersDesc => 'required',
            self::getIsCheck => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getSuppliersId.'.required' => '请设置',
            self::getSuppliersName.'.required' => '请设置',
            self::getSuppliersDesc.'.required' => '请设置',
            self::getIsCheck.'.required' => '请设置',
        ];
    }
}

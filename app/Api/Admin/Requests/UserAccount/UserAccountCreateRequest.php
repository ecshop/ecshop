<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserAccount;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserAccountCreateRequest',
    required: [
        self::getUserId,
        self::getAdminUser,
        self::getAmount,
        self::getAddTime,
        self::getPaidTime,
        self::getAdminNote,
        self::getUserNote,
        self::getProcessType,
        self::getPayment,
        self::getIsPaid,
    ],
    properties: [
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminUser, description: '', type: 'string'),
        new OA\Property(property: self::getAmount, description: '', type: 'string'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getPaidTime, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminNote, description: '', type: 'string'),
        new OA\Property(property: self::getUserNote, description: '', type: 'string'),
        new OA\Property(property: self::getProcessType, description: '', type: 'integer'),
        new OA\Property(property: self::getPayment, description: '', type: 'string'),
        new OA\Property(property: self::getIsPaid, description: '', type: 'integer'),
    ]
)]
class UserAccountCreateRequest extends FormRequest
{
    const string getUserId = 'userId';

    const string getAdminUser = 'adminUser';

    const string getAmount = 'amount';

    const string getAddTime = 'addTime';

    const string getPaidTime = 'paidTime';

    const string getAdminNote = 'adminNote';

    const string getUserNote = 'userNote';

    const string getProcessType = 'processType';

    const string getPayment = 'payment';

    const string getIsPaid = 'isPaid';

    public function rules(): array
    {
        return [
            self::getUserId => 'required',
            self::getAdminUser => 'required',
            self::getAmount => 'required',
            self::getAddTime => 'required',
            self::getPaidTime => 'required',
            self::getAdminNote => 'required',
            self::getUserNote => 'required',
            self::getProcessType => 'required',
            self::getPayment => 'required',
            self::getIsPaid => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getUserId.'.required' => '请设置',
            self::getAdminUser.'.required' => '请设置',
            self::getAmount.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getPaidTime.'.required' => '请设置',
            self::getAdminNote.'.required' => '请设置',
            self::getUserNote.'.required' => '请设置',
            self::getProcessType.'.required' => '请设置',
            self::getPayment.'.required' => '请设置',
            self::getIsPaid.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminMessage;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminMessageCreateRequest',
    required: [
        self::getMessageId,
        self::getSenderId,
        self::getReceiverId,
        self::getSentTime,
        self::getReadTime,
        self::getReaded,
        self::getDeleted,
        self::getTitle,
        self::getMessage,
    ],
    properties: [
        new OA\Property(property: self::getMessageId, description: '', type: 'integer'),
        new OA\Property(property: self::getSenderId, description: '', type: 'integer'),
        new OA\Property(property: self::getReceiverId, description: '', type: 'integer'),
        new OA\Property(property: self::getSentTime, description: '', type: 'integer'),
        new OA\Property(property: self::getReadTime, description: '', type: 'integer'),
        new OA\Property(property: self::getReaded, description: '', type: 'integer'),
        new OA\Property(property: self::getDeleted, description: '', type: 'integer'),
        new OA\Property(property: self::getTitle, description: '', type: 'string'),
        new OA\Property(property: self::getMessage, description: '', type: 'string'),
    ]
)]
class AdminMessageCreateRequest extends FormRequest
{
    const string getMessageId = 'messageId';

    const string getSenderId = 'senderId';

    const string getReceiverId = 'receiverId';

    const string getSentTime = 'sentTime';

    const string getReadTime = 'readTime';

    const string getReaded = 'readed';

    const string getDeleted = 'deleted';

    const string getTitle = 'title';

    const string getMessage = 'message';

    public function rules(): array
    {
        return [
            self::getMessageId => 'required',
            self::getSenderId => 'required',
            self::getReceiverId => 'required',
            self::getSentTime => 'required',
            self::getReadTime => 'required',
            self::getReaded => 'required',
            self::getDeleted => 'required',
            self::getTitle => 'required',
            self::getMessage => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getMessageId.'.required' => '请设置',
            self::getSenderId.'.required' => '请设置',
            self::getReceiverId.'.required' => '请设置',
            self::getSentTime.'.required' => '请设置',
            self::getReadTime.'.required' => '请设置',
            self::getReaded.'.required' => '请设置',
            self::getDeleted.'.required' => '请设置',
            self::getTitle.'.required' => '请设置',
            self::getMessage.'.required' => '请设置',
        ];
    }
}

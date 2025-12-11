<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FeedbackUpdateRequest',
    required: [
        self::getMsgId,
        self::getParentId,
        self::getUserId,
        self::getUserName,
        self::getUserEmail,
        self::getMsgTitle,
        self::getMsgType,
        self::getMsgStatus,
        self::getMsgContent,
        self::getMsgTime,
        self::getMessageImg,
        self::getOrderId,
        self::getMsgArea,
    ],
    properties: [
        new OA\Property(property: self::getMsgId, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserName, description: '', type: 'string'),
        new OA\Property(property: self::getUserEmail, description: '', type: 'string'),
        new OA\Property(property: self::getMsgTitle, description: '', type: 'string'),
        new OA\Property(property: self::getMsgType, description: '', type: 'integer'),
        new OA\Property(property: self::getMsgStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getMsgContent, description: '', type: 'string'),
        new OA\Property(property: self::getMsgTime, description: '', type: 'integer'),
        new OA\Property(property: self::getMessageImg, description: '', type: 'string'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getMsgArea, description: '', type: 'integer'),
    ]
)]
class FeedbackUpdateRequest extends FormRequest
{
    const string getMsgId = 'msgId';

    const string getParentId = 'parentId';

    const string getUserId = 'userId';

    const string getUserName = 'userName';

    const string getUserEmail = 'userEmail';

    const string getMsgTitle = 'msgTitle';

    const string getMsgType = 'msgType';

    const string getMsgStatus = 'msgStatus';

    const string getMsgContent = 'msgContent';

    const string getMsgTime = 'msgTime';

    const string getMessageImg = 'messageImg';

    const string getOrderId = 'orderId';

    const string getMsgArea = 'msgArea';

    public function rules(): array
    {
        return [
            self::getMsgId => 'required',
            self::getParentId => 'required',
            self::getUserId => 'required',
            self::getUserName => 'required',
            self::getUserEmail => 'required',
            self::getMsgTitle => 'required',
            self::getMsgType => 'required',
            self::getMsgStatus => 'required',
            self::getMsgContent => 'required',
            self::getMsgTime => 'required',
            self::getMessageImg => 'required',
            self::getOrderId => 'required',
            self::getMsgArea => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getMsgId.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getUserName.'.required' => '请设置',
            self::getUserEmail.'.required' => '请设置',
            self::getMsgTitle.'.required' => '请设置',
            self::getMsgType.'.required' => '请设置',
            self::getMsgStatus.'.required' => '请设置',
            self::getMsgContent.'.required' => '请设置',
            self::getMsgTime.'.required' => '请设置',
            self::getMessageImg.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getMsgArea.'.required' => '请设置',
        ];
    }
}

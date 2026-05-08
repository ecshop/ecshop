<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CommentCreateRequest',
    required: [
        self::getCommentId,
        self::getCommentType,
        self::getIdValue,
        self::getEmail,
        self::getUserName,
        self::getContent,
        self::getCommentRank,
        self::getAddTime,
        self::getIpAddress,
        self::getStatus,
        self::getParentId,
        self::getUserId,
    ],
    properties: [
        new OA\Property(property: self::getCommentId, description: '', type: 'integer'),
        new OA\Property(property: self::getCommentType, description: '', type: 'integer'),
        new OA\Property(property: self::getIdValue, description: '', type: 'integer'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getUserName, description: '', type: 'string'),
        new OA\Property(property: self::getContent, description: '', type: 'string'),
        new OA\Property(property: self::getCommentRank, description: '', type: 'integer'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getIpAddress, description: '', type: 'string'),
        new OA\Property(property: self::getStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
    ]
)]
class CommentCreateRequest extends FormRequest
{
    const string getCommentId = 'commentId';

    const string getCommentType = 'commentType';

    const string getIdValue = 'idValue';

    const string getEmail = 'email';

    const string getUserName = 'userName';

    const string getContent = 'content';

    const string getCommentRank = 'commentRank';

    const string getAddTime = 'addTime';

    const string getIpAddress = 'ipAddress';

    const string getStatus = 'status';

    const string getParentId = 'parentId';

    const string getUserId = 'userId';

    public function rules(): array
    {
        return [
            self::getCommentId => 'required',
            self::getCommentType => 'required',
            self::getIdValue => 'required',
            self::getEmail => 'required',
            self::getUserName => 'required',
            self::getContent => 'required',
            self::getCommentRank => 'required',
            self::getAddTime => 'required',
            self::getIpAddress => 'required',
            self::getStatus => 'required',
            self::getParentId => 'required',
            self::getUserId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCommentId.'.required' => '请设置',
            self::getCommentType.'.required' => '请设置',
            self::getIdValue.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getUserName.'.required' => '请设置',
            self::getContent.'.required' => '请设置',
            self::getCommentRank.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getIpAddress.'.required' => '请设置',
            self::getStatus.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
        ];
    }
}

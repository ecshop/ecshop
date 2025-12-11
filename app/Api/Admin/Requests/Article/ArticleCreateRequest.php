<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ArticleCreateRequest',
    required: [
        self::getArticleId,
        self::getCatId,
        self::getTitle,
        self::getContent,
        self::getAuthor,
        self::getAuthorEmail,
        self::getKeywords,
        self::getArticleType,
        self::getIsOpen,
        self::getAddTime,
        self::getFileUrl,
        self::getOpenType,
        self::getLink,
        self::getDescription,
    ],
    properties: [
        new OA\Property(property: self::getArticleId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getTitle, description: '', type: 'string'),
        new OA\Property(property: self::getContent, description: '', type: 'string'),
        new OA\Property(property: self::getAuthor, description: '', type: 'string'),
        new OA\Property(property: self::getAuthorEmail, description: '', type: 'string'),
        new OA\Property(property: self::getKeywords, description: '', type: 'string'),
        new OA\Property(property: self::getArticleType, description: '', type: 'integer'),
        new OA\Property(property: self::getIsOpen, description: '', type: 'integer'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getFileUrl, description: '', type: 'string'),
        new OA\Property(property: self::getOpenType, description: '', type: 'integer'),
        new OA\Property(property: self::getLink, description: '', type: 'string'),
        new OA\Property(property: self::getDescription, description: '', type: 'string'),
    ]
)]
class ArticleCreateRequest extends FormRequest
{
    const string getArticleId = 'articleId';

    const string getCatId = 'catId';

    const string getTitle = 'title';

    const string getContent = 'content';

    const string getAuthor = 'author';

    const string getAuthorEmail = 'authorEmail';

    const string getKeywords = 'keywords';

    const string getArticleType = 'articleType';

    const string getIsOpen = 'isOpen';

    const string getAddTime = 'addTime';

    const string getFileUrl = 'fileUrl';

    const string getOpenType = 'openType';

    const string getLink = 'link';

    const string getDescription = 'description';

    public function rules(): array
    {
        return [
            self::getArticleId => 'required',
            self::getCatId => 'required',
            self::getTitle => 'required',
            self::getContent => 'required',
            self::getAuthor => 'required',
            self::getAuthorEmail => 'required',
            self::getKeywords => 'required',
            self::getArticleType => 'required',
            self::getIsOpen => 'required',
            self::getAddTime => 'required',
            self::getFileUrl => 'required',
            self::getOpenType => 'required',
            self::getLink => 'required',
            self::getDescription => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getArticleId.'.required' => '请设置',
            self::getCatId.'.required' => '请设置',
            self::getTitle.'.required' => '请设置',
            self::getContent.'.required' => '请设置',
            self::getAuthor.'.required' => '请设置',
            self::getAuthorEmail.'.required' => '请设置',
            self::getKeywords.'.required' => '请设置',
            self::getArticleType.'.required' => '请设置',
            self::getIsOpen.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getFileUrl.'.required' => '请设置',
            self::getOpenType.'.required' => '请设置',
            self::getLink.'.required' => '请设置',
            self::getDescription.'.required' => '请设置',
        ];
    }
}

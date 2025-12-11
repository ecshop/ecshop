<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TopicCreateRequest',
    required: [
        self::getTopicId,
        self::getTitle,
        self::getIntro,
        self::getStartTime,
        self::getEndTime,
        self::getData,
        self::getTemplate,
        self::getCss,
        self::getTopicImg,
        self::getTitlePic,
        self::getBaseStyle,
        self::getHtmls,
        self::getKeywords,
        self::getDescription,
    ],
    properties: [
        new OA\Property(property: self::getTopicId, description: '', type: 'integer'),
        new OA\Property(property: self::getTitle, description: '', type: 'string'),
        new OA\Property(property: self::getIntro, description: '', type: 'string'),
        new OA\Property(property: self::getStartTime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndTime, description: '', type: 'integer'),
        new OA\Property(property: self::getData, description: '', type: 'string'),
        new OA\Property(property: self::getTemplate, description: '', type: 'string'),
        new OA\Property(property: self::getCss, description: '', type: 'string'),
        new OA\Property(property: self::getTopicImg, description: '', type: 'string'),
        new OA\Property(property: self::getTitlePic, description: '', type: 'string'),
        new OA\Property(property: self::getBaseStyle, description: '', type: 'string'),
        new OA\Property(property: self::getHtmls, description: '', type: 'string'),
        new OA\Property(property: self::getKeywords, description: '', type: 'string'),
        new OA\Property(property: self::getDescription, description: '', type: 'string'),
    ]
)]
class TopicCreateRequest extends FormRequest
{
    const string getTopicId = 'topicId';

    const string getTitle = 'title';

    const string getIntro = 'intro';

    const string getStartTime = 'startTime';

    const string getEndTime = 'endTime';

    const string getData = 'data';

    const string getTemplate = 'template';

    const string getCss = 'css';

    const string getTopicImg = 'topicImg';

    const string getTitlePic = 'titlePic';

    const string getBaseStyle = 'baseStyle';

    const string getHtmls = 'htmls';

    const string getKeywords = 'keywords';

    const string getDescription = 'description';

    public function rules(): array
    {
        return [
            self::getTopicId => 'required',
            self::getTitle => 'required',
            self::getIntro => 'required',
            self::getStartTime => 'required',
            self::getEndTime => 'required',
            self::getData => 'required',
            self::getTemplate => 'required',
            self::getCss => 'required',
            self::getTopicImg => 'required',
            self::getTitlePic => 'required',
            self::getBaseStyle => 'required',
            self::getHtmls => 'required',
            self::getKeywords => 'required',
            self::getDescription => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getTopicId.'.required' => '请设置',
            self::getTitle.'.required' => '请设置',
            self::getIntro.'.required' => '请设置',
            self::getStartTime.'.required' => '请设置',
            self::getEndTime.'.required' => '请设置',
            self::getData.'.required' => '请设置',
            self::getTemplate.'.required' => '请设置',
            self::getCss.'.required' => '请设置',
            self::getTopicImg.'.required' => '请设置',
            self::getTitlePic.'.required' => '请设置',
            self::getBaseStyle.'.required' => '请设置',
            self::getHtmls.'.required' => '请设置',
            self::getKeywords.'.required' => '请设置',
            self::getDescription.'.required' => '请设置',
        ];
    }
}

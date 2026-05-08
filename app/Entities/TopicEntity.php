<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'TopicEntity')]
class TopicEntity
{
    use DTOHelper;

    const string getTopicId = 'topic_id';

    const string getTitle = 'title';

    const string getIntro = 'intro';

    const string getStartTime = 'start_time';

    const string getEndTime = 'end_time';

    const string getData = 'data';

    const string getTemplate = 'template';

    const string getCss = 'css';

    const string getTopicImg = 'topic_img';

    const string getTitlePic = 'title_pic';

    const string getBaseStyle = 'base_style';

    const string getHtmls = 'htmls';

    const string getKeywords = 'keywords';

    const string getDescription = 'description';

    #[OA\Property(property: 'topicId', description: '', type: 'integer')]
    private int $topicId;

    #[OA\Property(property: 'title', description: '', type: 'string')]
    private string $title;

    #[OA\Property(property: 'intro', description: '', type: 'string')]
    private string $intro;

    #[OA\Property(property: 'startTime', description: '', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'data', description: '', type: 'string')]
    private string $data;

    #[OA\Property(property: 'template', description: '', type: 'string')]
    private string $template;

    #[OA\Property(property: 'css', description: '', type: 'string')]
    private string $css;

    #[OA\Property(property: 'topicImg', description: '', type: 'string')]
    private string $topicImg;

    #[OA\Property(property: 'titlePic', description: '', type: 'string')]
    private string $titlePic;

    #[OA\Property(property: 'baseStyle', description: '', type: 'string')]
    private string $baseStyle;

    #[OA\Property(property: 'htmls', description: '', type: 'string')]
    private string $htmls;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'description', description: '', type: 'string')]
    private string $description;

    /**
     * 获取
     */
    public function getTopicId(): int
    {
        return $this->topicId;
    }

    /**
     * 设置
     */
    public function setTopicId(int $topicId): void
    {
        $this->topicId = $topicId;
    }

    /**
     * 获取
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * 设置
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * 获取
     */
    public function getIntro(): string
    {
        return $this->intro;
    }

    /**
     * 设置
     */
    public function setIntro(string $intro): void
    {
        $this->intro = $intro;
    }

    /**
     * 获取
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * 设置
     */
    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * 获取
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }

    /**
     * 设置
     */
    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * 获取
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * 设置
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * 获取
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * 设置
     */
    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    /**
     * 获取
     */
    public function getCss(): string
    {
        return $this->css;
    }

    /**
     * 设置
     */
    public function setCss(string $css): void
    {
        $this->css = $css;
    }

    /**
     * 获取
     */
    public function getTopicImg(): string
    {
        return $this->topicImg;
    }

    /**
     * 设置
     */
    public function setTopicImg(string $topicImg): void
    {
        $this->topicImg = $topicImg;
    }

    /**
     * 获取
     */
    public function getTitlePic(): string
    {
        return $this->titlePic;
    }

    /**
     * 设置
     */
    public function setTitlePic(string $titlePic): void
    {
        $this->titlePic = $titlePic;
    }

    /**
     * 获取
     */
    public function getBaseStyle(): string
    {
        return $this->baseStyle;
    }

    /**
     * 设置
     */
    public function setBaseStyle(string $baseStyle): void
    {
        $this->baseStyle = $baseStyle;
    }

    /**
     * 获取
     */
    public function getHtmls(): string
    {
        return $this->htmls;
    }

    /**
     * 设置
     */
    public function setHtmls(string $htmls): void
    {
        $this->htmls = $htmls;
    }

    /**
     * 获取
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * 设置
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * 获取
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 设置
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}

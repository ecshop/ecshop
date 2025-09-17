<?php

declare(strict_types=1);

namespace app\modules\admin\response\activityTopic;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityTopicResponse')]
class ActivityTopicResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'title', description: '专题标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'intro', description: '专题介绍', type: 'string')]
    private string $intro;

    #[OA\Property(property: 'startTime', description: '开始时间戳', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '结束时间戳', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'data', description: '专题数据', type: 'string')]
    private string $data;

    #[OA\Property(property: 'template', description: '模板文件', type: 'string')]
    private string $template;

    #[OA\Property(property: 'css', description: 'CSS样式', type: 'string')]
    private string $css;

    #[OA\Property(property: 'topicImg', description: '专题图片', type: 'string')]
    private string $topicImg;

    #[OA\Property(property: 'titlePic', description: '标题图片', type: 'string')]
    private string $titlePic;

    #[OA\Property(property: 'baseStyle', description: '基础样式', type: 'string')]
    private string $baseStyle;

    #[OA\Property(property: 'htmls', description: '生成的HTML内容', type: 'string')]
    private string $htmls;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'description', description: '描述', type: 'string')]
    private string $description;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getIntro(): string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): void
    {
        $this->intro = $intro;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    public function getCss(): string
    {
        return $this->css;
    }

    public function setCss(string $css): void
    {
        $this->css = $css;
    }

    public function getTopicImg(): string
    {
        return $this->topicImg;
    }

    public function setTopicImg(string $topicImg): void
    {
        $this->topicImg = $topicImg;
    }

    public function getTitlePic(): string
    {
        return $this->titlePic;
    }

    public function setTitlePic(string $titlePic): void
    {
        $this->titlePic = $titlePic;
    }

    public function getBaseStyle(): string
    {
        return $this->baseStyle;
    }

    public function setBaseStyle(string $baseStyle): void
    {
        $this->baseStyle = $baseStyle;
    }

    public function getHtmls(): string
    {
        return $this->htmls;
    }

    public function setHtmls(string $htmls): void
    {
        $this->htmls = $htmls;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}

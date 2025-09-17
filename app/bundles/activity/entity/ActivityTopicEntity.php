<?php

declare(strict_types=1);

namespace app\bundles\activity\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityTopicEntity')]
class ActivityTopicEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'title', description: '专题标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'intro', description: '专题介绍', type: 'string')]
    private string $intro;

    #[OA\Property(property: 'start_time', description: '开始时间戳', type: 'integer')]
    private int $start_time;

    #[OA\Property(property: 'end_time', description: '结束时间戳', type: 'integer')]
    private int $end_time;

    #[OA\Property(property: 'data', description: '专题数据', type: 'string')]
    private string $data;

    #[OA\Property(property: 'template', description: '模板文件', type: 'string')]
    private string $template;

    #[OA\Property(property: 'css', description: 'CSS样式', type: 'string')]
    private string $css;

    #[OA\Property(property: 'topic_img', description: '专题图片', type: 'string')]
    private string $topic_img;

    #[OA\Property(property: 'title_pic', description: '标题图片', type: 'string')]
    private string $title_pic;

    #[OA\Property(property: 'base_style', description: '基础样式', type: 'string')]
    private string $base_style;

    #[OA\Property(property: 'htmls', description: '生成的HTML内容', type: 'string')]
    private string $htmls;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'description', description: '描述', type: 'string')]
    private string $description;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->start_time;
    }

    public function setStartTime(int $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->end_time;
    }

    public function setEndTime(int $endTime): void
    {
        $this->end_time = $endTime;
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
        return $this->topic_img;
    }

    public function setTopicImg(string $topicImg): void
    {
        $this->topic_img = $topicImg;
    }

    public function getTitlePic(): string
    {
        return $this->title_pic;
    }

    public function setTitlePic(string $titlePic): void
    {
        $this->title_pic = $titlePic;
    }

    public function getBaseStyle(): string
    {
        return $this->base_style;
    }

    public function setBaseStyle(string $baseStyle): void
    {
        $this->base_style = $baseStyle;
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
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}

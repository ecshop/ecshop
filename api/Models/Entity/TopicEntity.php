<?php

namespace App\Models\Entity;

/**
 * Class TopicEntity
 * @package App\Models\Entity
 */
class TopicEntity
{
    /**
     * @var int 
     */
    private int $topic_id;

    /**
     * @var string 
     */
    private string $title;

    /**
     * @var string 
     */
    private string $intro;

    /**
     * @var int 
     */
    private int $start_time;

    /**
     * @var int 
     */
    private int $end_time;

    /**
     * @var string 
     */
    private string $data;

    /**
     * @var string 
     */
    private string $template;

    /**
     * @var string 
     */
    private string $css;

    /**
     * @var string 
     */
    private string $topic_img;

    /**
     * @var string 
     */
    private string $title_pic;

    /**
     * @var string 
     */
    private string $base_style;

    /**
     * @var string 
     */
    private string $htmls;

    /**
     * @var string 
     */
    private string $keywords;

    /**
     * @var string 
     */
    private string $description;

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->topic_id;
    }

    /**
     * @param int $value
     */
    public function setTopicId(int $value)
    {
        $this->topic_id = $value;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value)
    {
        $this->title = $value;
    }

    /**
     * @return string
     */
    public function getIntro(): string
    {
        return $this->intro;
    }

    /**
     * @param string $value
     */
    public function setIntro(string $value)
    {
        $this->intro = $value;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->start_time;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value)
    {
        $this->start_time = $value;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->end_time;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value)
    {
        $this->end_time = $value;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $value
     */
    public function setData(string $value)
    {
        $this->data = $value;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $value
     */
    public function setTemplate(string $value)
    {
        $this->template = $value;
    }

    /**
     * @return string
     */
    public function getCss(): string
    {
        return $this->css;
    }

    /**
     * @param string $value
     */
    public function setCss(string $value)
    {
        $this->css = $value;
    }

    /**
     * @return string
     */
    public function getTopicImg(): string
    {
        return $this->topic_img;
    }

    /**
     * @param string $value
     */
    public function setTopicImg(string $value)
    {
        $this->topic_img = $value;
    }

    /**
     * @return string
     */
    public function getTitlePic(): string
    {
        return $this->title_pic;
    }

    /**
     * @param string $value
     */
    public function setTitlePic(string $value)
    {
        $this->title_pic = $value;
    }

    /**
     * @return string
     */
    public function getBaseStyle(): string
    {
        return $this->base_style;
    }

    /**
     * @param string $value
     */
    public function setBaseStyle(string $value)
    {
        $this->base_style = $value;
    }

    /**
     * @return string
     */
    public function getHtmls(): string
    {
        return $this->htmls;
    }

    /**
     * @param string $value
     */
    public function setHtmls(string $value)
    {
        $this->htmls = $value;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $value
     */
    public function setKeywords(string $value)
    {
        $this->keywords = $value;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $value
     */
    public function setDescription(string $value)
    {
        $this->description = $value;
    }

}

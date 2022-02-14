<?php

namespace App\Models\Entity;

/**
 * Class ArticleEntity
 * @package App\Models\Entity
 */
class ArticleEntity
{
    /**
     * @var int 
     */
    private int $article_id;

    /**
     * @var int 
     */
    private int $cat_id;

    /**
     * @var string 
     */
    private string $title;

    /**
     * @var string 
     */
    private string $content;

    /**
     * @var string 
     */
    private string $author;

    /**
     * @var string 
     */
    private string $author_email;

    /**
     * @var string 
     */
    private string $keywords;

    /**
     * @var int 
     */
    private int $article_type;

    /**
     * @var int 
     */
    private int $is_open;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var string 
     */
    private string $file_url;

    /**
     * @var int 
     */
    private int $open_type;

    /**
     * @var string 
     */
    private string $link;

    /**
     * @var string 
     */
    private string $description;

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->article_id;
    }

    /**
     * @param int $value
     */
    public function setArticleId(int $value)
    {
        $this->article_id = $value;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $value
     */
    public function setCatId(int $value)
    {
        $this->cat_id = $value;
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $value
     */
    public function setContent(string $value)
    {
        $this->content = $value;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $value
     */
    public function setAuthor(string $value)
    {
        $this->author = $value;
    }

    /**
     * @return string
     */
    public function getAuthorEmail(): string
    {
        return $this->author_email;
    }

    /**
     * @param string $value
     */
    public function setAuthorEmail(string $value)
    {
        $this->author_email = $value;
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
     * @return int
     */
    public function getArticleType(): int
    {
        return $this->article_type;
    }

    /**
     * @param int $value
     */
    public function setArticleType(int $value)
    {
        $this->article_type = $value;
    }

    /**
     * @return int
     */
    public function getIsOpen(): int
    {
        return $this->is_open;
    }

    /**
     * @param int $value
     */
    public function setIsOpen(int $value)
    {
        $this->is_open = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return string
     */
    public function getFileUrl(): string
    {
        return $this->file_url;
    }

    /**
     * @param string $value
     */
    public function setFileUrl(string $value)
    {
        $this->file_url = $value;
    }

    /**
     * @return int
     */
    public function getOpenType(): int
    {
        return $this->open_type;
    }

    /**
     * @param int $value
     */
    public function setOpenType(int $value)
    {
        $this->open_type = $value;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $value
     */
    public function setLink(string $value)
    {
        $this->link = $value;
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

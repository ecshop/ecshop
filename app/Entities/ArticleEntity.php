<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleEntity')]
class ArticleEntity
{
    use DTOHelper;

    const string getArticleId = 'article_id';

    const string getCatId = 'cat_id';

    const string getTitle = 'title';

    const string getContent = 'content';

    const string getAuthor = 'author';

    const string getAuthorEmail = 'author_email';

    const string getKeywords = 'keywords';

    const string getArticleType = 'article_type';

    const string getIsOpen = 'is_open';

    const string getAddTime = 'add_time';

    const string getFileUrl = 'file_url';

    const string getOpenType = 'open_type';

    const string getLink = 'link';

    const string getDescription = 'description';

    #[OA\Property(property: 'articleId', description: '', type: 'integer')]
    private int $articleId;

    #[OA\Property(property: 'catId', description: '', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'title', description: '', type: 'string')]
    private string $title;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    private string $content;

    #[OA\Property(property: 'author', description: '', type: 'string')]
    private string $author;

    #[OA\Property(property: 'authorEmail', description: '', type: 'string')]
    private string $authorEmail;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'articleType', description: '', type: 'integer')]
    private int $articleType;

    #[OA\Property(property: 'isOpen', description: '', type: 'integer')]
    private int $isOpen;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'fileUrl', description: '', type: 'string')]
    private string $fileUrl;

    #[OA\Property(property: 'openType', description: '', type: 'integer')]
    private int $openType;

    #[OA\Property(property: 'link', description: '', type: 'string')]
    private string $link;

    #[OA\Property(property: 'description', description: '', type: 'string')]
    private string $description;

    /**
     * 获取
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * 设置
     */
    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    /**
     * 获取
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * 设置
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * 获取
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * 设置
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * 获取
     */
    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }

    /**
     * 设置
     */
    public function setAuthorEmail(string $authorEmail): void
    {
        $this->authorEmail = $authorEmail;
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
    public function getArticleType(): int
    {
        return $this->articleType;
    }

    /**
     * 设置
     */
    public function setArticleType(int $articleType): void
    {
        $this->articleType = $articleType;
    }

    /**
     * 获取
     */
    public function getIsOpen(): int
    {
        return $this->isOpen;
    }

    /**
     * 设置
     */
    public function setIsOpen(int $isOpen): void
    {
        $this->isOpen = $isOpen;
    }

    /**
     * 获取
     */
    public function getAddTime(): int
    {
        return $this->addTime;
    }

    /**
     * 设置
     */
    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    /**
     * 获取
     */
    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    /**
     * 设置
     */
    public function setFileUrl(string $fileUrl): void
    {
        $this->fileUrl = $fileUrl;
    }

    /**
     * 获取
     */
    public function getOpenType(): int
    {
        return $this->openType;
    }

    /**
     * 设置
     */
    public function setOpenType(int $openType): void
    {
        $this->openType = $openType;
    }

    /**
     * 获取
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * 设置
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
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

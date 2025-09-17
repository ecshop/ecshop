<?php

declare(strict_types=1);

namespace app\modules\admin\response\article;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleResponse')]
class ArticleResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '文章ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catId', description: '分类ID', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'title', description: '文章标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'content', description: '文章内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'author', description: '作者', type: 'string')]
    private string $author;

    #[OA\Property(property: 'authorEmail', description: '作者邮箱', type: 'string')]
    private string $authorEmail;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'articleType', description: '文章类型', type: 'integer')]
    private int $articleType;

    #[OA\Property(property: 'isOpen', description: '是否显示', type: 'integer')]
    private int $isOpen;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'fileUrl', description: '附件URL', type: 'string')]
    private string $fileUrl;

    #[OA\Property(property: 'openType', description: '打开方式', type: 'integer')]
    private int $openType;

    #[OA\Property(property: 'link', description: '外部链接', type: 'string')]
    private string $link;

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

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail(string $authorEmail): void
    {
        $this->authorEmail = $authorEmail;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getArticleType(): int
    {
        return $this->articleType;
    }

    public function setArticleType(int $articleType): void
    {
        $this->articleType = $articleType;
    }

    public function getIsOpen(): int
    {
        return $this->isOpen;
    }

    public function setIsOpen(int $isOpen): void
    {
        $this->isOpen = $isOpen;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    public function setFileUrl(string $fileUrl): void
    {
        $this->fileUrl = $fileUrl;
    }

    public function getOpenType(): int
    {
        return $this->openType;
    }

    public function setOpenType(int $openType): void
    {
        $this->openType = $openType;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
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

<?php

declare(strict_types=1);

namespace app\bundles\article\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleEntity')]
class ArticleEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '文章ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_id', description: '分类ID', type: 'integer')]
    private int $cat_id;

    #[OA\Property(property: 'title', description: '文章标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'content', description: '文章内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'author', description: '作者', type: 'string')]
    private string $author;

    #[OA\Property(property: 'author_email', description: '作者邮箱', type: 'string')]
    private string $author_email;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'article_type', description: '文章类型', type: 'integer')]
    private int $article_type;

    #[OA\Property(property: 'is_open', description: '是否显示', type: 'integer')]
    private int $is_open;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'file_url', description: '附件URL', type: 'string')]
    private string $file_url;

    #[OA\Property(property: 'open_type', description: '打开方式', type: 'integer')]
    private int $open_type;

    #[OA\Property(property: 'link', description: '外部链接', type: 'string')]
    private string $link;

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

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function setCatId(int $catId): void
    {
        $this->cat_id = $catId;
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
        return $this->author_email;
    }

    public function setAuthorEmail(string $authorEmail): void
    {
        $this->author_email = $authorEmail;
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
        return $this->article_type;
    }

    public function setArticleType(int $articleType): void
    {
        $this->article_type = $articleType;
    }

    public function getIsOpen(): int
    {
        return $this->is_open;
    }

    public function setIsOpen(int $isOpen): void
    {
        $this->is_open = $isOpen;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getFileUrl(): string
    {
        return $this->file_url;
    }

    public function setFileUrl(string $fileUrl): void
    {
        $this->file_url = $fileUrl;
    }

    public function getOpenType(): int
    {
        return $this->open_type;
    }

    public function setOpenType(int $openType): void
    {
        $this->open_type = $openType;
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

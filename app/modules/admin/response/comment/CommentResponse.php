<?php

declare(strict_types=1);

namespace app\modules\admin\response\comment;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CommentResponse')]
class CommentResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '评论ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'commentType', description: '评论类型(1商品 2文章)', type: 'integer')]
    private int $commentType;

    #[OA\Property(property: 'idValue', description: '关联ID(商品ID或文章ID)', type: 'integer')]
    private int $idValue;

    #[OA\Property(property: 'email', description: '用户邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'userName', description: '用户名', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'content', description: '评论内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'commentRank', description: '评论等级(1-5星)', type: 'integer')]
    private int $commentRank;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'ipAddress', description: 'IP地址', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'status', description: '审核状态(0未审核 1已审核)', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'parentId', description: '父评论ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

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

    public function getCommentType(): int
    {
        return $this->commentType;
    }

    public function setCommentType(int $commentType): void
    {
        $this->commentType = $commentType;
    }

    public function getIdValue(): int
    {
        return $this->idValue;
    }

    public function setIdValue(int $idValue): void
    {
        $this->idValue = $idValue;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCommentRank(): int
    {
        return $this->commentRank;
    }

    public function setCommentRank(int $commentRank): void
    {
        $this->commentRank = $commentRank;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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

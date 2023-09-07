<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CommentSchema')]
class Comment
{
    use ArrayObject;

    #[OA\Property(property: 'comment_id', description: '', type: 'integer')]
    protected int $commentId;

    #[OA\Property(property: 'comment_type', description: '', type: 'integer')]
    protected int $commentType;

    #[OA\Property(property: 'id_value', description: '', type: 'integer')]
    protected int $idValue;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    protected string $content;

    #[OA\Property(property: 'comment_rank', description: '', type: 'integer')]
    protected int $commentRank;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'ip_address', description: '', type: 'string')]
    protected string $ipAddress;

    #[OA\Property(property: 'status', description: '', type: 'integer')]
    protected int $status;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    /**
     * 获取
     */
    public function getCommentId(): int
    {
        return $this->commentId;
    }

    /**
     * 设置
     */
    public function setCommentId(int $commentId): void
    {
        $this->commentId = $commentId;
    }

    /**
     * 获取
     */
    public function getCommentType(): int
    {
        return $this->commentType;
    }

    /**
     * 设置
     */
    public function setCommentType(int $commentType): void
    {
        $this->commentType = $commentType;
    }

    /**
     * 获取
     */
    public function getIdValue(): int
    {
        return $this->idValue;
    }

    /**
     * 设置
     */
    public function setIdValue(int $idValue): void
    {
        $this->idValue = $idValue;
    }

    /**
     * 获取
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * 设置
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
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
    public function getCommentRank(): int
    {
        return $this->commentRank;
    }

    /**
     * 设置
     */
    public function setCommentRank(int $commentRank): void
    {
        $this->commentRank = $commentRank;
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
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * 设置
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * 获取
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * 设置
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}

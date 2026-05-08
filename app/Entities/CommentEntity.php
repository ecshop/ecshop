<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CommentEntity')]
class CommentEntity
{
    use DTOHelper;

    const string getCommentId = 'comment_id';

    const string getCommentType = 'comment_type';

    const string getIdValue = 'id_value';

    const string getEmail = 'email';

    const string getUserName = 'user_name';

    const string getContent = 'content';

    const string getCommentRank = 'comment_rank';

    const string getAddTime = 'add_time';

    const string getIpAddress = 'ip_address';

    const string getStatus = 'status';

    const string getParentId = 'parent_id';

    const string getUserId = 'user_id';

    #[OA\Property(property: 'commentId', description: '', type: 'integer')]
    private int $commentId;

    #[OA\Property(property: 'commentType', description: '', type: 'integer')]
    private int $commentType;

    #[OA\Property(property: 'idValue', description: '', type: 'integer')]
    private int $idValue;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'userName', description: '', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    private string $content;

    #[OA\Property(property: 'commentRank', description: '', type: 'integer')]
    private int $commentRank;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'ipAddress', description: '', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'status', description: '', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

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

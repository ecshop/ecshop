<?php

declare(strict_types=1);

namespace app\bundles\comment\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CommentEntity')]
class CommentEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '评论ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'comment_type', description: '评论类型(1商品 2文章)', type: 'integer')]
    private int $comment_type;

    #[OA\Property(property: 'id_value', description: '关联ID(商品ID或文章ID)', type: 'integer')]
    private int $id_value;

    #[OA\Property(property: 'email', description: '用户邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'user_name', description: '用户名', type: 'string')]
    private string $user_name;

    #[OA\Property(property: 'content', description: '评论内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'comment_rank', description: '评论等级(1-5星)', type: 'integer')]
    private int $comment_rank;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'ip_address', description: 'IP地址', type: 'string')]
    private string $ip_address;

    #[OA\Property(property: 'status', description: '审核状态(0未审核 1已审核)', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'parent_id', description: '父评论ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

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

    public function getCommentType(): int
    {
        return $this->comment_type;
    }

    public function setCommentType(int $commentType): void
    {
        $this->comment_type = $commentType;
    }

    public function getIdValue(): int
    {
        return $this->id_value;
    }

    public function setIdValue(int $idValue): void
    {
        $this->id_value = $idValue;
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
        return $this->user_name;
    }

    public function setUserName(string $userName): void
    {
        $this->user_name = $userName;
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
        return $this->comment_rank;
    }

    public function setCommentRank(int $commentRank): void
    {
        $this->comment_rank = $commentRank;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ip_address = $ipAddress;
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
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
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

<?php

declare(strict_types=1);

namespace app\modules\admin\response\adminMessage;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminMessageResponse')]
class AdminMessageResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '消息ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'senderId', description: '发送者ID', type: 'integer')]
    private int $senderId;

    #[OA\Property(property: 'receiverId', description: '接收者ID', type: 'integer')]
    private int $receiverId;

    #[OA\Property(property: 'sentTime', description: '发送时间', type: 'integer')]
    private int $sentTime;

    #[OA\Property(property: 'readTime', description: '阅读时间', type: 'integer')]
    private int $readTime;

    #[OA\Property(property: 'readed', description: '是否已读', type: 'integer')]
    private int $readed;

    #[OA\Property(property: 'deleted', description: '是否删除', type: 'integer')]
    private int $deleted;

    #[OA\Property(property: 'title', description: '消息标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'message', description: '消息内容', type: 'string')]
    private string $message;

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

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function setReceiverId(int $receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    public function getSentTime(): int
    {
        return $this->sentTime;
    }

    public function setSentTime(int $sentTime): void
    {
        $this->sentTime = $sentTime;
    }

    public function getReadTime(): int
    {
        return $this->readTime;
    }

    public function setReadTime(int $readTime): void
    {
        $this->readTime = $readTime;
    }

    public function getReaded(): int
    {
        return $this->readed;
    }

    public function setReaded(int $readed): void
    {
        $this->readed = $readed;
    }

    public function getDeleted(): int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
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

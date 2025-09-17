<?php

declare(strict_types=1);

namespace app\bundles\admin\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminMessageEntity')]
class AdminMessageEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '消息ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'sender_id', description: '发送者ID', type: 'integer')]
    private int $sender_id;

    #[OA\Property(property: 'receiver_id', description: '接收者ID', type: 'integer')]
    private int $receiver_id;

    #[OA\Property(property: 'sent_time', description: '发送时间', type: 'integer')]
    private int $sent_time;

    #[OA\Property(property: 'read_time', description: '阅读时间', type: 'integer')]
    private int $read_time;

    #[OA\Property(property: 'readed', description: '是否已读', type: 'integer')]
    private int $readed;

    #[OA\Property(property: 'deleted', description: '是否删除', type: 'integer')]
    private int $deleted;

    #[OA\Property(property: 'title', description: '消息标题', type: 'string')]
    private string $title;

    #[OA\Property(property: 'message', description: '消息内容', type: 'string')]
    private string $message;

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

    public function getSenderId(): int
    {
        return $this->sender_id;
    }

    public function setSenderId(int $senderId): void
    {
        $this->sender_id = $senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    public function setReceiverId(int $receiverId): void
    {
        $this->receiver_id = $receiverId;
    }

    public function getSentTime(): int
    {
        return $this->sent_time;
    }

    public function setSentTime(int $sentTime): void
    {
        $this->sent_time = $sentTime;
    }

    public function getReadTime(): int
    {
        return $this->read_time;
    }

    public function setReadTime(int $readTime): void
    {
        $this->read_time = $readTime;
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

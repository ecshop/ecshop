<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminMessageEntity')]
class AdminMessageEntity
{
    use ArrayObject;

    #[OA\Property(property: 'message_id', description: '', type: 'integer')]
    protected int $messageId;

    #[OA\Property(property: 'sender_id', description: '', type: 'integer')]
    protected int $senderId;

    #[OA\Property(property: 'receiver_id', description: '', type: 'integer')]
    protected int $receiverId;

    #[OA\Property(property: 'sent_time', description: '', type: 'integer')]
    protected int $sentTime;

    #[OA\Property(property: 'read_time', description: '', type: 'integer')]
    protected int $readTime;

    #[OA\Property(property: 'readed', description: '', type: 'integer')]
    protected int $readed;

    #[OA\Property(property: 'deleted', description: '', type: 'integer')]
    protected int $deleted;

    #[OA\Property(property: 'title', description: '', type: 'string')]
    protected string $title;

    #[OA\Property(property: 'message', description: '', type: 'string')]
    protected string $message;

    /**
     * 获取
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * 设置
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * 获取
     */
    public function getSenderId(): int
    {
        return $this->senderId;
    }

    /**
     * 设置
     */
    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * 获取
     */
    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    /**
     * 设置
     */
    public function setReceiverId(int $receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    /**
     * 获取
     */
    public function getSentTime(): int
    {
        return $this->sentTime;
    }

    /**
     * 设置
     */
    public function setSentTime(int $sentTime): void
    {
        $this->sentTime = $sentTime;
    }

    /**
     * 获取
     */
    public function getReadTime(): int
    {
        return $this->readTime;
    }

    /**
     * 设置
     */
    public function setReadTime(int $readTime): void
    {
        $this->readTime = $readTime;
    }

    /**
     * 获取
     */
    public function getReaded(): int
    {
        return $this->readed;
    }

    /**
     * 设置
     */
    public function setReaded(int $readed): void
    {
        $this->readed = $readed;
    }

    /**
     * 获取
     */
    public function getDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * 设置
     */
    public function setDeleted(int $deleted): void
    {
        $this->deleted = $deleted;
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
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * 设置
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}

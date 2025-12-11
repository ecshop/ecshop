<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminMessageEntity')]
class AdminMessageEntity
{
    use DTOHelper;

    const string getMessageId = 'message_id';

    const string getSenderId = 'sender_id';

    const string getReceiverId = 'receiver_id';

    const string getSentTime = 'sent_time';

    const string getReadTime = 'read_time';

    const string getReaded = 'readed';

    const string getDeleted = 'deleted';

    const string getTitle = 'title';

    const string getMessage = 'message';

    #[OA\Property(property: 'messageId', description: '', type: 'integer')]
    private int $messageId;

    #[OA\Property(property: 'senderId', description: '', type: 'integer')]
    private int $senderId;

    #[OA\Property(property: 'receiverId', description: '', type: 'integer')]
    private int $receiverId;

    #[OA\Property(property: 'sentTime', description: '', type: 'integer')]
    private int $sentTime;

    #[OA\Property(property: 'readTime', description: '', type: 'integer')]
    private int $readTime;

    #[OA\Property(property: 'readed', description: '', type: 'integer')]
    private int $readed;

    #[OA\Property(property: 'deleted', description: '', type: 'integer')]
    private int $deleted;

    #[OA\Property(property: 'title', description: '', type: 'string')]
    private string $title;

    #[OA\Property(property: 'message', description: '', type: 'string')]
    private string $message;

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

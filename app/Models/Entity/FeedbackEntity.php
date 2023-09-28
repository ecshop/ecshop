<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FeedbackEntity')]
class FeedbackEntity
{
    use ArrayObject;

    #[OA\Property(property: 'msg_id', description: '', type: 'integer')]
    protected int $msgId;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'user_email', description: '', type: 'string')]
    protected string $userEmail;

    #[OA\Property(property: 'msg_title', description: '', type: 'string')]
    protected string $msgTitle;

    #[OA\Property(property: 'msg_type', description: '', type: 'integer')]
    protected int $msgType;

    #[OA\Property(property: 'msg_status', description: '', type: 'integer')]
    protected int $msgStatus;

    #[OA\Property(property: 'msg_content', description: '', type: 'string')]
    protected string $msgContent;

    #[OA\Property(property: 'msg_time', description: '', type: 'integer')]
    protected int $msgTime;

    #[OA\Property(property: 'message_img', description: '', type: 'string')]
    protected string $messageImg;

    #[OA\Property(property: 'order_id', description: '', type: 'integer')]
    protected int $orderId;

    #[OA\Property(property: 'msg_area', description: '', type: 'integer')]
    protected int $msgArea;

    /**
     * 获取
     */
    public function getMsgId(): int
    {
        return $this->msgId;
    }

    /**
     * 设置
     */
    public function setMsgId(int $msgId): void
    {
        $this->msgId = $msgId;
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
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * 设置
     */
    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * 获取
     */
    public function getMsgTitle(): string
    {
        return $this->msgTitle;
    }

    /**
     * 设置
     */
    public function setMsgTitle(string $msgTitle): void
    {
        $this->msgTitle = $msgTitle;
    }

    /**
     * 获取
     */
    public function getMsgType(): int
    {
        return $this->msgType;
    }

    /**
     * 设置
     */
    public function setMsgType(int $msgType): void
    {
        $this->msgType = $msgType;
    }

    /**
     * 获取
     */
    public function getMsgStatus(): int
    {
        return $this->msgStatus;
    }

    /**
     * 设置
     */
    public function setMsgStatus(int $msgStatus): void
    {
        $this->msgStatus = $msgStatus;
    }

    /**
     * 获取
     */
    public function getMsgContent(): string
    {
        return $this->msgContent;
    }

    /**
     * 设置
     */
    public function setMsgContent(string $msgContent): void
    {
        $this->msgContent = $msgContent;
    }

    /**
     * 获取
     */
    public function getMsgTime(): int
    {
        return $this->msgTime;
    }

    /**
     * 设置
     */
    public function setMsgTime(int $msgTime): void
    {
        $this->msgTime = $msgTime;
    }

    /**
     * 获取
     */
    public function getMessageImg(): string
    {
        return $this->messageImg;
    }

    /**
     * 设置
     */
    public function setMessageImg(string $messageImg): void
    {
        $this->messageImg = $messageImg;
    }

    /**
     * 获取
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * 设置
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * 获取
     */
    public function getMsgArea(): int
    {
        return $this->msgArea;
    }

    /**
     * 设置
     */
    public function setMsgArea(int $msgArea): void
    {
        $this->msgArea = $msgArea;
    }
}

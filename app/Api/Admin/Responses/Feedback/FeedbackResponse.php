<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Feedback;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FeedbackResponse')]
class FeedbackResponse
{
    use DTOHelper;

    #[OA\Property(property: 'msgId', description: '', type: 'integer')]
    private int $msgId;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userName', description: '', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'userEmail', description: '', type: 'string')]
    private string $userEmail;

    #[OA\Property(property: 'msgTitle', description: '', type: 'string')]
    private string $msgTitle;

    #[OA\Property(property: 'msgType', description: '', type: 'integer')]
    private int $msgType;

    #[OA\Property(property: 'msgStatus', description: '', type: 'integer')]
    private int $msgStatus;

    #[OA\Property(property: 'msgContent', description: '', type: 'string')]
    private string $msgContent;

    #[OA\Property(property: 'msgTime', description: '', type: 'integer')]
    private int $msgTime;

    #[OA\Property(property: 'messageImg', description: '', type: 'string')]
    private string $messageImg;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'msgArea', description: '', type: 'integer')]
    private int $msgArea;

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

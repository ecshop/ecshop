<?php

declare(strict_types=1);

namespace app\modules\admin\response\userFeedback;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserFeedbackResponse')]
class UserFeedbackResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '反馈消息ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parentId', description: '父消息ID(用于回复)', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userName', description: '用户名', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'userEmail', description: '用户邮箱', type: 'string')]
    private string $userEmail;

    #[OA\Property(property: 'msgTitle', description: '反馈标题', type: 'string')]
    private string $msgTitle;

    #[OA\Property(property: 'msgType', description: '反馈类型(0咨询 1投诉 2建议 3售后)', type: 'integer')]
    private int $msgType;

    #[OA\Property(property: 'msgStatus', description: '处理状态(0未处理 1已处理)', type: 'integer')]
    private int $msgStatus;

    #[OA\Property(property: 'msgContent', description: '反馈内容', type: 'string')]
    private string $msgContent;

    #[OA\Property(property: 'msgTime', description: '反馈时间', type: 'integer')]
    private int $msgTime;

    #[OA\Property(property: 'messageImg', description: '反馈图片', type: 'string')]
    private string $messageImg;

    #[OA\Property(property: 'orderId', description: '关联订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'msgArea', description: '反馈区域(0前台 1后台)', type: 'integer')]
    private int $msgArea;

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

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    public function getMsgTitle(): string
    {
        return $this->msgTitle;
    }

    public function setMsgTitle(string $msgTitle): void
    {
        $this->msgTitle = $msgTitle;
    }

    public function getMsgType(): int
    {
        return $this->msgType;
    }

    public function setMsgType(int $msgType): void
    {
        $this->msgType = $msgType;
    }

    public function getMsgStatus(): int
    {
        return $this->msgStatus;
    }

    public function setMsgStatus(int $msgStatus): void
    {
        $this->msgStatus = $msgStatus;
    }

    public function getMsgContent(): string
    {
        return $this->msgContent;
    }

    public function setMsgContent(string $msgContent): void
    {
        $this->msgContent = $msgContent;
    }

    public function getMsgTime(): int
    {
        return $this->msgTime;
    }

    public function setMsgTime(int $msgTime): void
    {
        $this->msgTime = $msgTime;
    }

    public function getMessageImg(): string
    {
        return $this->messageImg;
    }

    public function setMessageImg(string $messageImg): void
    {
        $this->messageImg = $messageImg;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getMsgArea(): int
    {
        return $this->msgArea;
    }

    public function setMsgArea(int $msgArea): void
    {
        $this->msgArea = $msgArea;
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

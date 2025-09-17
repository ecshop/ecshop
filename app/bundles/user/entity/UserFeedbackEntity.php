<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserFeedbackEntity')]
class UserFeedbackEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '反馈消息ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parent_id', description: '父消息ID(用于回复)', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'user_name', description: '用户名', type: 'string')]
    private string $user_name;

    #[OA\Property(property: 'user_email', description: '用户邮箱', type: 'string')]
    private string $user_email;

    #[OA\Property(property: 'msg_title', description: '反馈标题', type: 'string')]
    private string $msg_title;

    #[OA\Property(property: 'msg_type', description: '反馈类型(0咨询 1投诉 2建议 3售后)', type: 'integer')]
    private int $msg_type;

    #[OA\Property(property: 'msg_status', description: '处理状态(0未处理 1已处理)', type: 'integer')]
    private int $msg_status;

    #[OA\Property(property: 'msg_content', description: '反馈内容', type: 'string')]
    private string $msg_content;

    #[OA\Property(property: 'msg_time', description: '反馈时间', type: 'integer')]
    private int $msg_time;

    #[OA\Property(property: 'message_img', description: '反馈图片', type: 'string')]
    private string $message_img;

    #[OA\Property(property: 'order_id', description: '关联订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'msg_area', description: '反馈区域(0前台 1后台)', type: 'integer')]
    private int $msg_area;

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

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function setUserName(string $userName): void
    {
        $this->user_name = $userName;
    }

    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->user_email = $userEmail;
    }

    public function getMsgTitle(): string
    {
        return $this->msg_title;
    }

    public function setMsgTitle(string $msgTitle): void
    {
        $this->msg_title = $msgTitle;
    }

    public function getMsgType(): int
    {
        return $this->msg_type;
    }

    public function setMsgType(int $msgType): void
    {
        $this->msg_type = $msgType;
    }

    public function getMsgStatus(): int
    {
        return $this->msg_status;
    }

    public function setMsgStatus(int $msgStatus): void
    {
        $this->msg_status = $msgStatus;
    }

    public function getMsgContent(): string
    {
        return $this->msg_content;
    }

    public function setMsgContent(string $msgContent): void
    {
        $this->msg_content = $msgContent;
    }

    public function getMsgTime(): int
    {
        return $this->msg_time;
    }

    public function setMsgTime(int $msgTime): void
    {
        $this->msg_time = $msgTime;
    }

    public function getMessageImg(): string
    {
        return $this->message_img;
    }

    public function setMessageImg(string $messageImg): void
    {
        $this->message_img = $messageImg;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function setOrderId(int $orderId): void
    {
        $this->order_id = $orderId;
    }

    public function getMsgArea(): int
    {
        return $this->msg_area;
    }

    public function setMsgArea(int $msgArea): void
    {
        $this->msg_area = $msgArea;
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

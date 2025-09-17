<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountEntity')]
class UserAccountEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'admin_user', description: '操作管理员', type: 'string')]
    private string $admin_user;

    #[OA\Property(property: 'amount', description: '金额', type: 'float')]
    private float $amount;

    #[OA\Property(property: 'add_time', description: '添加时间戳', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'paid_time', description: '支付时间戳', type: 'integer')]
    private int $paid_time;

    #[OA\Property(property: 'admin_note', description: '管理员备注', type: 'string')]
    private string $admin_note;

    #[OA\Property(property: 'user_note', description: '用户备注', type: 'string')]
    private string $user_note;

    #[OA\Property(property: 'process_type', description: '处理类型(0充值 1提现)', type: 'integer')]
    private int $process_type;

    #[OA\Property(property: 'payment', description: '支付方式', type: 'string')]
    private string $payment;

    #[OA\Property(property: 'is_paid', description: '是否已支付', type: 'integer')]
    private int $is_paid;

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

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getAdminUser(): string
    {
        return $this->admin_user;
    }

    public function setAdminUser(string $adminUser): void
    {
        $this->admin_user = $adminUser;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getPaidTime(): int
    {
        return $this->paid_time;
    }

    public function setPaidTime(int $paidTime): void
    {
        $this->paid_time = $paidTime;
    }

    public function getAdminNote(): string
    {
        return $this->admin_note;
    }

    public function setAdminNote(string $adminNote): void
    {
        $this->admin_note = $adminNote;
    }

    public function getUserNote(): string
    {
        return $this->user_note;
    }

    public function setUserNote(string $userNote): void
    {
        $this->user_note = $userNote;
    }

    public function getProcessType(): int
    {
        return $this->process_type;
    }

    public function setProcessType(int $processType): void
    {
        $this->process_type = $processType;
    }

    public function getPayment(): string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): void
    {
        $this->payment = $payment;
    }

    public function getIsPaid(): int
    {
        return $this->is_paid;
    }

    public function setIsPaid(int $isPaid): void
    {
        $this->is_paid = $isPaid;
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

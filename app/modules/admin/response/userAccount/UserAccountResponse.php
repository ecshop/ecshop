<?php

declare(strict_types=1);

namespace app\modules\admin\response\userAccount;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountResponse')]
class UserAccountResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'adminUser', description: '操作管理员', type: 'string')]
    private string $adminUser;

    #[OA\Property(property: 'amount', description: '金额', type: 'float')]
    private float $amount;

    #[OA\Property(property: 'addTime', description: '添加时间戳', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'paidTime', description: '支付时间戳', type: 'integer')]
    private int $paidTime;

    #[OA\Property(property: 'adminNote', description: '管理员备注', type: 'string')]
    private string $adminNote;

    #[OA\Property(property: 'userNote', description: '用户备注', type: 'string')]
    private string $userNote;

    #[OA\Property(property: 'processType', description: '处理类型(0充值 1提现)', type: 'integer')]
    private int $processType;

    #[OA\Property(property: 'payment', description: '支付方式', type: 'string')]
    private string $payment;

    #[OA\Property(property: 'isPaid', description: '是否已支付', type: 'integer')]
    private int $isPaid;

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

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getAdminUser(): string
    {
        return $this->adminUser;
    }

    public function setAdminUser(string $adminUser): void
    {
        $this->adminUser = $adminUser;
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
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getPaidTime(): int
    {
        return $this->paidTime;
    }

    public function setPaidTime(int $paidTime): void
    {
        $this->paidTime = $paidTime;
    }

    public function getAdminNote(): string
    {
        return $this->adminNote;
    }

    public function setAdminNote(string $adminNote): void
    {
        $this->adminNote = $adminNote;
    }

    public function getUserNote(): string
    {
        return $this->userNote;
    }

    public function setUserNote(string $userNote): void
    {
        $this->userNote = $userNote;
    }

    public function getProcessType(): int
    {
        return $this->processType;
    }

    public function setProcessType(int $processType): void
    {
        $this->processType = $processType;
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
        return $this->isPaid;
    }

    public function setIsPaid(int $isPaid): void
    {
        $this->isPaid = $isPaid;
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

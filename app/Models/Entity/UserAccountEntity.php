<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountEntity')]
class UserAccountEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'admin_user', description: '', type: 'string')]
    protected string $adminUser;

    #[OA\Property(property: 'amount', description: '', type: 'float')]
    protected float $amount;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'paid_time', description: '', type: 'integer')]
    protected int $paidTime;

    #[OA\Property(property: 'admin_note', description: '', type: 'string')]
    protected string $adminNote;

    #[OA\Property(property: 'user_note', description: '', type: 'string')]
    protected string $userNote;

    #[OA\Property(property: 'process_type', description: '', type: 'integer')]
    protected int $processType;

    #[OA\Property(property: 'payment', description: '', type: 'string')]
    protected string $payment;

    #[OA\Property(property: 'is_paid', description: '', type: 'integer')]
    protected int $isPaid;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getAdminUser(): string
    {
        return $this->adminUser;
    }

    /**
     * 设置
     */
    public function setAdminUser(string $adminUser): void
    {
        $this->adminUser = $adminUser;
    }

    /**
     * 获取
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * 设置
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * 获取
     */
    public function getAddTime(): int
    {
        return $this->addTime;
    }

    /**
     * 设置
     */
    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    /**
     * 获取
     */
    public function getPaidTime(): int
    {
        return $this->paidTime;
    }

    /**
     * 设置
     */
    public function setPaidTime(int $paidTime): void
    {
        $this->paidTime = $paidTime;
    }

    /**
     * 获取
     */
    public function getAdminNote(): string
    {
        return $this->adminNote;
    }

    /**
     * 设置
     */
    public function setAdminNote(string $adminNote): void
    {
        $this->adminNote = $adminNote;
    }

    /**
     * 获取
     */
    public function getUserNote(): string
    {
        return $this->userNote;
    }

    /**
     * 设置
     */
    public function setUserNote(string $userNote): void
    {
        $this->userNote = $userNote;
    }

    /**
     * 获取
     */
    public function getProcessType(): int
    {
        return $this->processType;
    }

    /**
     * 设置
     */
    public function setProcessType(int $processType): void
    {
        $this->processType = $processType;
    }

    /**
     * 获取
     */
    public function getPayment(): string
    {
        return $this->payment;
    }

    /**
     * 设置
     */
    public function setPayment(string $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * 获取
     */
    public function getIsPaid(): int
    {
        return $this->isPaid;
    }

    /**
     * 设置
     */
    public function setIsPaid(int $isPaid): void
    {
        $this->isPaid = $isPaid;
    }
}

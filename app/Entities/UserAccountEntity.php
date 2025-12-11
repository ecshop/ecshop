<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountEntity')]
class UserAccountEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getUserId = 'user_id';

    const string getAdminUser = 'admin_user';

    const string getAmount = 'amount';

    const string getAddTime = 'add_time';

    const string getPaidTime = 'paid_time';

    const string getAdminNote = 'admin_note';

    const string getUserNote = 'user_note';

    const string getProcessType = 'process_type';

    const string getPayment = 'payment';

    const string getIsPaid = 'is_paid';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'adminUser', description: '', type: 'string')]
    private string $adminUser;

    #[OA\Property(property: 'amount', description: '', type: 'string')]
    private string $amount;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'paidTime', description: '', type: 'integer')]
    private int $paidTime;

    #[OA\Property(property: 'adminNote', description: '', type: 'string')]
    private string $adminNote;

    #[OA\Property(property: 'userNote', description: '', type: 'string')]
    private string $userNote;

    #[OA\Property(property: 'processType', description: '', type: 'integer')]
    private int $processType;

    #[OA\Property(property: 'payment', description: '', type: 'string')]
    private string $payment;

    #[OA\Property(property: 'isPaid', description: '', type: 'integer')]
    private int $isPaid;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * 设置
     */
    public function setAmount(string $amount): void
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

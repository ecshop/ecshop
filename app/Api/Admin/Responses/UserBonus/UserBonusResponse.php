<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\UserBonus;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserBonusResponse')]
class UserBonusResponse
{
    use DTOHelper;

    #[OA\Property(property: 'bonusId', description: '', type: 'integer')]
    private int $bonusId;

    #[OA\Property(property: 'bonusTypeId', description: '', type: 'integer')]
    private int $bonusTypeId;

    #[OA\Property(property: 'bonusSn', description: '', type: 'integer')]
    private int $bonusSn;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'usedTime', description: '', type: 'integer')]
    private int $usedTime;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'emailed', description: '', type: 'integer')]
    private int $emailed;

    /**
     * 获取
     */
    public function getBonusId(): int
    {
        return $this->bonusId;
    }

    /**
     * 设置
     */
    public function setBonusId(int $bonusId): void
    {
        $this->bonusId = $bonusId;
    }

    /**
     * 获取
     */
    public function getBonusTypeId(): int
    {
        return $this->bonusTypeId;
    }

    /**
     * 设置
     */
    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonusTypeId = $bonusTypeId;
    }

    /**
     * 获取
     */
    public function getBonusSn(): int
    {
        return $this->bonusSn;
    }

    /**
     * 设置
     */
    public function setBonusSn(int $bonusSn): void
    {
        $this->bonusSn = $bonusSn;
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
    public function getUsedTime(): int
    {
        return $this->usedTime;
    }

    /**
     * 设置
     */
    public function setUsedTime(int $usedTime): void
    {
        $this->usedTime = $usedTime;
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
    public function getEmailed(): int
    {
        return $this->emailed;
    }

    /**
     * 设置
     */
    public function setEmailed(int $emailed): void
    {
        $this->emailed = $emailed;
    }
}

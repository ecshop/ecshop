<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VirtualCardSchema')]
class VirtualCard
{
    use ArrayObject;

    #[OA\Property(property: 'card_id', description: '', type: 'integer')]
    protected int $cardId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'card_sn', description: '', type: 'string')]
    protected string $cardSn;

    #[OA\Property(property: 'card_password', description: '', type: 'string')]
    protected string $cardPassword;

    #[OA\Property(property: 'add_date', description: '', type: 'integer')]
    protected int $addDate;

    #[OA\Property(property: 'end_date', description: '', type: 'integer')]
    protected int $endDate;

    #[OA\Property(property: 'is_saled', description: '', type: 'integer')]
    protected int $isSaled;

    #[OA\Property(property: 'order_sn', description: '', type: 'string')]
    protected string $orderSn;

    #[OA\Property(property: 'crc32', description: '', type: 'string')]
    protected string $crc32;

    /**
     * 获取
     */
    public function getCardId(): int
    {
        return $this->cardId;
    }

    /**
     * 设置
     */
    public function setCardId(int $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * 获取
     */
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * 获取
     */
    public function getCardSn(): string
    {
        return $this->cardSn;
    }

    /**
     * 设置
     */
    public function setCardSn(string $cardSn): void
    {
        $this->cardSn = $cardSn;
    }

    /**
     * 获取
     */
    public function getCardPassword(): string
    {
        return $this->cardPassword;
    }

    /**
     * 设置
     */
    public function setCardPassword(string $cardPassword): void
    {
        $this->cardPassword = $cardPassword;
    }

    /**
     * 获取
     */
    public function getAddDate(): int
    {
        return $this->addDate;
    }

    /**
     * 设置
     */
    public function setAddDate(int $addDate): void
    {
        $this->addDate = $addDate;
    }

    /**
     * 获取
     */
    public function getEndDate(): int
    {
        return $this->endDate;
    }

    /**
     * 设置
     */
    public function setEndDate(int $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * 获取
     */
    public function getIsSaled(): int
    {
        return $this->isSaled;
    }

    /**
     * 设置
     */
    public function setIsSaled(int $isSaled): void
    {
        $this->isSaled = $isSaled;
    }

    /**
     * 获取
     */
    public function getOrderSn(): string
    {
        return $this->orderSn;
    }

    /**
     * 设置
     */
    public function setOrderSn(string $orderSn): void
    {
        $this->orderSn = $orderSn;
    }

    /**
     * 获取
     */
    public function getCrc32(): string
    {
        return $this->crc32;
    }

    /**
     * 设置
     */
    public function setCrc32(string $crc32): void
    {
        $this->crc32 = $crc32;
    }
}

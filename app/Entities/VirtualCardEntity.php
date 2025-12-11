<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VirtualCardEntity')]
class VirtualCardEntity
{
    use DTOHelper;

    const string getCardId = 'card_id';

    const string getGoodsId = 'goods_id';

    const string getCardSn = 'card_sn';

    const string getCardPassword = 'card_password';

    const string getAddDate = 'add_date';

    const string getEndDate = 'end_date';

    const string getIsSaled = 'is_saled';

    const string getOrderSn = 'order_sn';

    const string getCrc32 = 'crc32';

    #[OA\Property(property: 'cardId', description: '', type: 'integer')]
    private int $cardId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'cardSn', description: '', type: 'string')]
    private string $cardSn;

    #[OA\Property(property: 'cardPassword', description: '', type: 'string')]
    private string $cardPassword;

    #[OA\Property(property: 'addDate', description: '', type: 'integer')]
    private int $addDate;

    #[OA\Property(property: 'endDate', description: '', type: 'integer')]
    private int $endDate;

    #[OA\Property(property: 'isSaled', description: '', type: 'integer')]
    private int $isSaled;

    #[OA\Property(property: 'orderSn', description: '', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'crc32', description: '', type: 'string')]
    private string $crc32;

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

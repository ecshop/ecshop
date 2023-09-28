<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BookingGoodEntity')]
class BookingGoodEntity
{
    use ArrayObject;

    #[OA\Property(property: 'rec_id', description: '', type: 'integer')]
    protected int $recId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'link_man', description: '', type: 'string')]
    protected string $linkMan;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    protected string $tel;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'goods_desc', description: '', type: 'string')]
    protected string $goodsDesc;

    #[OA\Property(property: 'goods_number', description: '', type: 'integer')]
    protected int $goodsNumber;

    #[OA\Property(property: 'booking_time', description: '', type: 'integer')]
    protected int $bookingTime;

    #[OA\Property(property: 'is_dispose', description: '', type: 'integer')]
    protected int $isDispose;

    #[OA\Property(property: 'dispose_user', description: '', type: 'string')]
    protected string $disposeUser;

    #[OA\Property(property: 'dispose_time', description: '', type: 'integer')]
    protected int $disposeTime;

    #[OA\Property(property: 'dispose_note', description: '', type: 'string')]
    protected string $disposeNote;

    /**
     * 获取
     */
    public function getRecId(): int
    {
        return $this->recId;
    }

    /**
     * 设置
     */
    public function setRecId(int $recId): void
    {
        $this->recId = $recId;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getLinkMan(): string
    {
        return $this->linkMan;
    }

    /**
     * 设置
     */
    public function setLinkMan(string $linkMan): void
    {
        $this->linkMan = $linkMan;
    }

    /**
     * 获取
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * 设置
     */
    public function setTel(string $tel): void
    {
        $this->tel = $tel;
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
    public function getGoodsDesc(): string
    {
        return $this->goodsDesc;
    }

    /**
     * 设置
     */
    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goodsDesc = $goodsDesc;
    }

    /**
     * 获取
     */
    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    /**
     * 设置
     */
    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
    }

    /**
     * 获取
     */
    public function getBookingTime(): int
    {
        return $this->bookingTime;
    }

    /**
     * 设置
     */
    public function setBookingTime(int $bookingTime): void
    {
        $this->bookingTime = $bookingTime;
    }

    /**
     * 获取
     */
    public function getIsDispose(): int
    {
        return $this->isDispose;
    }

    /**
     * 设置
     */
    public function setIsDispose(int $isDispose): void
    {
        $this->isDispose = $isDispose;
    }

    /**
     * 获取
     */
    public function getDisposeUser(): string
    {
        return $this->disposeUser;
    }

    /**
     * 设置
     */
    public function setDisposeUser(string $disposeUser): void
    {
        $this->disposeUser = $disposeUser;
    }

    /**
     * 获取
     */
    public function getDisposeTime(): int
    {
        return $this->disposeTime;
    }

    /**
     * 设置
     */
    public function setDisposeTime(int $disposeTime): void
    {
        $this->disposeTime = $disposeTime;
    }

    /**
     * 获取
     */
    public function getDisposeNote(): string
    {
        return $this->disposeNote;
    }

    /**
     * 设置
     */
    public function setDisposeNote(string $disposeNote): void
    {
        $this->disposeNote = $disposeNote;
    }
}

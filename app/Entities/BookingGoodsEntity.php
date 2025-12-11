<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BookingGoodsEntity')]
class BookingGoodsEntity
{
    use DTOHelper;

    const string getRecId = 'rec_id';

    const string getUserId = 'user_id';

    const string getEmail = 'email';

    const string getLinkMan = 'link_man';

    const string getTel = 'tel';

    const string getGoodsId = 'goods_id';

    const string getGoodsDesc = 'goods_desc';

    const string getGoodsNumber = 'goods_number';

    const string getBookingTime = 'booking_time';

    const string getIsDispose = 'is_dispose';

    const string getDisposeUser = 'dispose_user';

    const string getDisposeTime = 'dispose_time';

    const string getDisposeNote = 'dispose_note';

    #[OA\Property(property: 'recId', description: '', type: 'integer')]
    private int $recId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'linkMan', description: '', type: 'string')]
    private string $linkMan;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'goodsDesc', description: '', type: 'string')]
    private string $goodsDesc;

    #[OA\Property(property: 'goodsNumber', description: '', type: 'integer')]
    private int $goodsNumber;

    #[OA\Property(property: 'bookingTime', description: '', type: 'integer')]
    private int $bookingTime;

    #[OA\Property(property: 'isDispose', description: '', type: 'integer')]
    private int $isDispose;

    #[OA\Property(property: 'disposeUser', description: '', type: 'string')]
    private string $disposeUser;

    #[OA\Property(property: 'disposeTime', description: '', type: 'integer')]
    private int $disposeTime;

    #[OA\Property(property: 'disposeNote', description: '', type: 'string')]
    private string $disposeNote;

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

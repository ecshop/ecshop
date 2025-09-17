<?php

declare(strict_types=1);

namespace app\modules\admin\response\userBooking;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserBookingResponse')]
class UserBookingResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '预订记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'email', description: '用户邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'linkMan', description: '联系人', type: 'string')]
    private string $linkMan;

    #[OA\Property(property: 'tel', description: '联系电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsDesc', description: '商品描述', type: 'string')]
    private string $goodsDesc;

    #[OA\Property(property: 'goodsNumber', description: '预订数量', type: 'integer')]
    private int $goodsNumber;

    #[OA\Property(property: 'bookingTime', description: '预订时间', type: 'integer')]
    private int $bookingTime;

    #[OA\Property(property: 'isDispose', description: '是否处理', type: 'integer')]
    private int $isDispose;

    #[OA\Property(property: 'disposeUser', description: '处理人', type: 'string')]
    private string $disposeUser;

    #[OA\Property(property: 'disposeTime', description: '处理时间', type: 'integer')]
    private int $disposeTime;

    #[OA\Property(property: 'disposeNote', description: '处理备注', type: 'string')]
    private string $disposeNote;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getLinkMan(): string
    {
        return $this->linkMan;
    }

    public function setLinkMan(string $linkMan): void
    {
        $this->linkMan = $linkMan;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getGoodsDesc(): string
    {
        return $this->goodsDesc;
    }

    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goodsDesc = $goodsDesc;
    }

    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
    }

    public function getBookingTime(): int
    {
        return $this->bookingTime;
    }

    public function setBookingTime(int $bookingTime): void
    {
        $this->bookingTime = $bookingTime;
    }

    public function getIsDispose(): int
    {
        return $this->isDispose;
    }

    public function setIsDispose(int $isDispose): void
    {
        $this->isDispose = $isDispose;
    }

    public function getDisposeUser(): string
    {
        return $this->disposeUser;
    }

    public function setDisposeUser(string $disposeUser): void
    {
        $this->disposeUser = $disposeUser;
    }

    public function getDisposeTime(): int
    {
        return $this->disposeTime;
    }

    public function setDisposeTime(int $disposeTime): void
    {
        $this->disposeTime = $disposeTime;
    }

    public function getDisposeNote(): string
    {
        return $this->disposeNote;
    }

    public function setDisposeNote(string $disposeNote): void
    {
        $this->disposeNote = $disposeNote;
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

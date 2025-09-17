<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserBookingEntity')]
class UserBookingEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '预订记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'email', description: '用户邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'link_man', description: '联系人', type: 'string')]
    private string $link_man;

    #[OA\Property(property: 'tel', description: '联系电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'goods_desc', description: '商品描述', type: 'string')]
    private string $goods_desc;

    #[OA\Property(property: 'goods_number', description: '预订数量', type: 'integer')]
    private int $goods_number;

    #[OA\Property(property: 'booking_time', description: '预订时间', type: 'integer')]
    private int $booking_time;

    #[OA\Property(property: 'is_dispose', description: '是否处理', type: 'integer')]
    private int $is_dispose;

    #[OA\Property(property: 'dispose_user', description: '处理人', type: 'string')]
    private string $dispose_user;

    #[OA\Property(property: 'dispose_time', description: '处理时间', type: 'integer')]
    private int $dispose_time;

    #[OA\Property(property: 'dispose_note', description: '处理备注', type: 'string')]
    private string $dispose_note;

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
        return $this->link_man;
    }

    public function setLinkMan(string $linkMan): void
    {
        $this->link_man = $linkMan;
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
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getGoodsDesc(): string
    {
        return $this->goods_desc;
    }

    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goods_desc = $goodsDesc;
    }

    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goods_number = $goodsNumber;
    }

    public function getBookingTime(): int
    {
        return $this->booking_time;
    }

    public function setBookingTime(int $bookingTime): void
    {
        $this->booking_time = $bookingTime;
    }

    public function getIsDispose(): int
    {
        return $this->is_dispose;
    }

    public function setIsDispose(int $isDispose): void
    {
        $this->is_dispose = $isDispose;
    }

    public function getDisposeUser(): string
    {
        return $this->dispose_user;
    }

    public function setDisposeUser(string $disposeUser): void
    {
        $this->dispose_user = $disposeUser;
    }

    public function getDisposeTime(): int
    {
        return $this->dispose_time;
    }

    public function setDisposeTime(int $disposeTime): void
    {
        $this->dispose_time = $disposeTime;
    }

    public function getDisposeNote(): string
    {
        return $this->dispose_note;
    }

    public function setDisposeNote(string $disposeNote): void
    {
        $this->dispose_note = $disposeNote;
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

<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopFriendLink;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopFriendLinkResponse')]
class ShopFriendLinkResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '链接ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'linkName', description: '链接名称', type: 'string')]
    private string $linkName;

    #[OA\Property(property: 'linkUrl', description: '链接URL', type: 'string')]
    private string $linkUrl;

    #[OA\Property(property: 'linkLogo', description: '链接LOGO', type: 'string')]
    private string $linkLogo;

    #[OA\Property(property: 'showOrder', description: '显示顺序', type: 'integer')]
    private int $showOrder;

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

    public function getLinkName(): string
    {
        return $this->linkName;
    }

    public function setLinkName(string $linkName): void
    {
        $this->linkName = $linkName;
    }

    public function getLinkUrl(): string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(string $linkUrl): void
    {
        $this->linkUrl = $linkUrl;
    }

    public function getLinkLogo(): string
    {
        return $this->linkLogo;
    }

    public function setLinkLogo(string $linkLogo): void
    {
        $this->linkLogo = $linkLogo;
    }

    public function getShowOrder(): int
    {
        return $this->showOrder;
    }

    public function setShowOrder(int $showOrder): void
    {
        $this->showOrder = $showOrder;
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

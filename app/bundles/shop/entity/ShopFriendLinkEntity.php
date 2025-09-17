<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopFriendLinkEntity')]
class ShopFriendLinkEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '链接ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'link_name', description: '链接名称', type: 'string')]
    private string $link_name;

    #[OA\Property(property: 'link_url', description: '链接URL', type: 'string')]
    private string $link_url;

    #[OA\Property(property: 'link_logo', description: '链接LOGO', type: 'string')]
    private string $link_logo;

    #[OA\Property(property: 'show_order', description: '显示顺序', type: 'integer')]
    private int $show_order;

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

    public function getLinkName(): string
    {
        return $this->link_name;
    }

    public function setLinkName(string $linkName): void
    {
        $this->link_name = $linkName;
    }

    public function getLinkUrl(): string
    {
        return $this->link_url;
    }

    public function setLinkUrl(string $linkUrl): void
    {
        $this->link_url = $linkUrl;
    }

    public function getLinkLogo(): string
    {
        return $this->link_logo;
    }

    public function setLinkLogo(string $linkLogo): void
    {
        $this->link_logo = $linkLogo;
    }

    public function getShowOrder(): int
    {
        return $this->show_order;
    }

    public function setShowOrder(int $showOrder): void
    {
        $this->show_order = $showOrder;
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

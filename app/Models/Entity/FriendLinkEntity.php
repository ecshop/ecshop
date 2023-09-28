<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FriendLinkEntity')]
class FriendLinkEntity
{
    use ArrayObject;

    #[OA\Property(property: 'link_id', description: '', type: 'integer')]
    protected int $linkId;

    #[OA\Property(property: 'link_name', description: '', type: 'string')]
    protected string $linkName;

    #[OA\Property(property: 'link_url', description: '', type: 'string')]
    protected string $linkUrl;

    #[OA\Property(property: 'link_logo', description: '', type: 'string')]
    protected string $linkLogo;

    #[OA\Property(property: 'show_order', description: '', type: 'integer')]
    protected int $showOrder;

    /**
     * 获取
     */
    public function getLinkId(): int
    {
        return $this->linkId;
    }

    /**
     * 设置
     */
    public function setLinkId(int $linkId): void
    {
        $this->linkId = $linkId;
    }

    /**
     * 获取
     */
    public function getLinkName(): string
    {
        return $this->linkName;
    }

    /**
     * 设置
     */
    public function setLinkName(string $linkName): void
    {
        $this->linkName = $linkName;
    }

    /**
     * 获取
     */
    public function getLinkUrl(): string
    {
        return $this->linkUrl;
    }

    /**
     * 设置
     */
    public function setLinkUrl(string $linkUrl): void
    {
        $this->linkUrl = $linkUrl;
    }

    /**
     * 获取
     */
    public function getLinkLogo(): string
    {
        return $this->linkLogo;
    }

    /**
     * 设置
     */
    public function setLinkLogo(string $linkLogo): void
    {
        $this->linkLogo = $linkLogo;
    }

    /**
     * 获取
     */
    public function getShowOrder(): int
    {
        return $this->showOrder;
    }

    /**
     * 设置
     */
    public function setShowOrder(int $showOrder): void
    {
        $this->showOrder = $showOrder;
    }
}

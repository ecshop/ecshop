<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\FriendLink;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FriendLinkResponse')]
class FriendLinkResponse
{
    use DTOHelper;

    #[OA\Property(property: 'linkId', description: '', type: 'integer')]
    private int $linkId;

    #[OA\Property(property: 'linkName', description: '', type: 'string')]
    private string $linkName;

    #[OA\Property(property: 'linkUrl', description: '', type: 'string')]
    private string $linkUrl;

    #[OA\Property(property: 'linkLogo', description: '', type: 'string')]
    private string $linkLogo;

    #[OA\Property(property: 'showOrder', description: '', type: 'integer')]
    private int $showOrder;

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

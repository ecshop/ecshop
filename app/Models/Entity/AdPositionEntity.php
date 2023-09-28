<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdPositionEntity')]
class AdPositionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'position_id', description: '', type: 'integer')]
    protected int $positionId;

    #[OA\Property(property: 'position_name', description: '', type: 'string')]
    protected string $positionName;

    #[OA\Property(property: 'ad_width', description: '', type: 'integer')]
    protected int $adWidth;

    #[OA\Property(property: 'ad_height', description: '', type: 'integer')]
    protected int $adHeight;

    #[OA\Property(property: 'position_desc', description: '', type: 'string')]
    protected string $positionDesc;

    #[OA\Property(property: 'position_style', description: '', type: 'string')]
    protected string $positionStyle;

    /**
     * 获取
     */
    public function getPositionId(): int
    {
        return $this->positionId;
    }

    /**
     * 设置
     */
    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    /**
     * 获取
     */
    public function getPositionName(): string
    {
        return $this->positionName;
    }

    /**
     * 设置
     */
    public function setPositionName(string $positionName): void
    {
        $this->positionName = $positionName;
    }

    /**
     * 获取
     */
    public function getAdWidth(): int
    {
        return $this->adWidth;
    }

    /**
     * 设置
     */
    public function setAdWidth(int $adWidth): void
    {
        $this->adWidth = $adWidth;
    }

    /**
     * 获取
     */
    public function getAdHeight(): int
    {
        return $this->adHeight;
    }

    /**
     * 设置
     */
    public function setAdHeight(int $adHeight): void
    {
        $this->adHeight = $adHeight;
    }

    /**
     * 获取
     */
    public function getPositionDesc(): string
    {
        return $this->positionDesc;
    }

    /**
     * 设置
     */
    public function setPositionDesc(string $positionDesc): void
    {
        $this->positionDesc = $positionDesc;
    }

    /**
     * 获取
     */
    public function getPositionStyle(): string
    {
        return $this->positionStyle;
    }

    /**
     * 设置
     */
    public function setPositionStyle(string $positionStyle): void
    {
        $this->positionStyle = $positionStyle;
    }
}

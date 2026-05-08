<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdPositionEntity')]
class AdPositionEntity
{
    use DTOHelper;

    const string getPositionId = 'position_id';

    const string getPositionName = 'position_name';

    const string getAdWidth = 'ad_width';

    const string getAdHeight = 'ad_height';

    const string getPositionDesc = 'position_desc';

    const string getPositionStyle = 'position_style';

    #[OA\Property(property: 'positionId', description: '', type: 'integer')]
    private int $positionId;

    #[OA\Property(property: 'positionName', description: '', type: 'string')]
    private string $positionName;

    #[OA\Property(property: 'adWidth', description: '', type: 'integer')]
    private int $adWidth;

    #[OA\Property(property: 'adHeight', description: '', type: 'integer')]
    private int $adHeight;

    #[OA\Property(property: 'positionDesc', description: '', type: 'string')]
    private string $positionDesc;

    #[OA\Property(property: 'positionStyle', description: '', type: 'string')]
    private string $positionStyle;

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

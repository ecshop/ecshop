<?php

declare(strict_types=1);

namespace app\modules\admin\response\adPosition;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdPositionResponse')]
class AdPositionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告位ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'positionName', description: '广告位名称', type: 'string')]
    private string $positionName;

    #[OA\Property(property: 'adWidth', description: '广告位宽度', type: 'integer')]
    private int $adWidth;

    #[OA\Property(property: 'adHeight', description: '广告位高度', type: 'integer')]
    private int $adHeight;

    #[OA\Property(property: 'positionDesc', description: '广告位描述', type: 'string')]
    private string $positionDesc;

    #[OA\Property(property: 'positionStyle', description: '广告位样式', type: 'string')]
    private string $positionStyle;

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

    public function getPositionName(): string
    {
        return $this->positionName;
    }

    public function setPositionName(string $positionName): void
    {
        $this->positionName = $positionName;
    }

    public function getAdWidth(): int
    {
        return $this->adWidth;
    }

    public function setAdWidth(int $adWidth): void
    {
        $this->adWidth = $adWidth;
    }

    public function getAdHeight(): int
    {
        return $this->adHeight;
    }

    public function setAdHeight(int $adHeight): void
    {
        $this->adHeight = $adHeight;
    }

    public function getPositionDesc(): string
    {
        return $this->positionDesc;
    }

    public function setPositionDesc(string $positionDesc): void
    {
        $this->positionDesc = $positionDesc;
    }

    public function getPositionStyle(): string
    {
        return $this->positionStyle;
    }

    public function setPositionStyle(string $positionStyle): void
    {
        $this->positionStyle = $positionStyle;
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

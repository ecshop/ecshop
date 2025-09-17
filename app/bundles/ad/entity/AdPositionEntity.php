<?php

declare(strict_types=1);

namespace app\bundles\ad\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdPositionEntity')]
class AdPositionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告位ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'position_name', description: '广告位名称', type: 'string')]
    private string $position_name;

    #[OA\Property(property: 'ad_width', description: '广告位宽度', type: 'integer')]
    private int $ad_width;

    #[OA\Property(property: 'ad_height', description: '广告位高度', type: 'integer')]
    private int $ad_height;

    #[OA\Property(property: 'position_desc', description: '广告位描述', type: 'string')]
    private string $position_desc;

    #[OA\Property(property: 'position_style', description: '广告位样式', type: 'string')]
    private string $position_style;

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

    public function getPositionName(): string
    {
        return $this->position_name;
    }

    public function setPositionName(string $positionName): void
    {
        $this->position_name = $positionName;
    }

    public function getAdWidth(): int
    {
        return $this->ad_width;
    }

    public function setAdWidth(int $adWidth): void
    {
        $this->ad_width = $adWidth;
    }

    public function getAdHeight(): int
    {
        return $this->ad_height;
    }

    public function setAdHeight(int $adHeight): void
    {
        $this->ad_height = $adHeight;
    }

    public function getPositionDesc(): string
    {
        return $this->position_desc;
    }

    public function setPositionDesc(string $positionDesc): void
    {
        $this->position_desc = $positionDesc;
    }

    public function getPositionStyle(): string
    {
        return $this->position_style;
    }

    public function setPositionStyle(string $positionStyle): void
    {
        $this->position_style = $positionStyle;
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

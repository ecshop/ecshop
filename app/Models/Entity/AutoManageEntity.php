<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AutoManageEntity')]
class AutoManageEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'item_id', description: '', type: 'integer')]
    protected int $itemId;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    protected string $type;

    #[OA\Property(property: 'starttime', description: '', type: 'integer')]
    protected int $starttime;

    #[OA\Property(property: 'endtime', description: '', type: 'integer')]
    protected int $endtime;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 获取
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /**
     * 设置
     */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * 获取
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * 设置
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * 获取
     */
    public function getStarttime(): int
    {
        return $this->starttime;
    }

    /**
     * 设置
     */
    public function setStarttime(int $starttime): void
    {
        $this->starttime = $starttime;
    }

    /**
     * 获取
     */
    public function getEndtime(): int
    {
        return $this->endtime;
    }

    /**
     * 设置
     */
    public function setEndtime(int $endtime): void
    {
        $this->endtime = $endtime;
    }
}

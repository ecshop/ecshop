<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\AutoManage;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AutoManageResponse')]
class AutoManageResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'itemId', description: '', type: 'integer')]
    private int $itemId;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    private string $type;

    #[OA\Property(property: 'starttime', description: '', type: 'integer')]
    private int $starttime;

    #[OA\Property(property: 'endtime', description: '', type: 'integer')]
    private int $endtime;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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

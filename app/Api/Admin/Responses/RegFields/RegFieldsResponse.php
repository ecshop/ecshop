<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\RegFields;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RegFieldsResponse')]
class RegFieldsResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'regFieldName', description: '', type: 'string')]
    private string $regFieldName;

    #[OA\Property(property: 'disOrder', description: '', type: 'integer')]
    private int $disOrder;

    #[OA\Property(property: 'display', description: '', type: 'integer')]
    private int $display;

    #[OA\Property(property: 'type', description: '', type: 'integer')]
    private int $type;

    #[OA\Property(property: 'isNeed', description: '', type: 'integer')]
    private int $isNeed;

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
    public function getRegFieldName(): string
    {
        return $this->regFieldName;
    }

    /**
     * 设置
     */
    public function setRegFieldName(string $regFieldName): void
    {
        $this->regFieldName = $regFieldName;
    }

    /**
     * 获取
     */
    public function getDisOrder(): int
    {
        return $this->disOrder;
    }

    /**
     * 设置
     */
    public function setDisOrder(int $disOrder): void
    {
        $this->disOrder = $disOrder;
    }

    /**
     * 获取
     */
    public function getDisplay(): int
    {
        return $this->display;
    }

    /**
     * 设置
     */
    public function setDisplay(int $display): void
    {
        $this->display = $display;
    }

    /**
     * 获取
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * 设置
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * 获取
     */
    public function getIsNeed(): int
    {
        return $this->isNeed;
    }

    /**
     * 设置
     */
    public function setIsNeed(int $isNeed): void
    {
        $this->isNeed = $isNeed;
    }
}

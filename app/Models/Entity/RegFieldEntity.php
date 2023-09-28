<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RegFieldEntity')]
class RegFieldEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'reg_field_name', description: '', type: 'string')]
    protected string $regFieldName;

    #[OA\Property(property: 'dis_order', description: '', type: 'integer')]
    protected int $disOrder;

    #[OA\Property(property: 'display', description: '', type: 'integer')]
    protected int $display;

    #[OA\Property(property: 'type', description: '', type: 'integer')]
    protected int $type;

    #[OA\Property(property: 'is_need', description: '', type: 'integer')]
    protected int $isNeed;

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

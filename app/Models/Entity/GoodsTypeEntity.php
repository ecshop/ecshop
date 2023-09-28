<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeEntity')]
class GoodsTypeEntity
{
    use ArrayObject;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'cat_name', description: '', type: 'string')]
    protected string $catName;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    protected int $enabled;

    #[OA\Property(property: 'attr_group', description: '', type: 'string')]
    protected string $attrGroup;

    /**
     * 获取
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * 获取
     */
    public function getCatName(): string
    {
        return $this->catName;
    }

    /**
     * 设置
     */
    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    /**
     * 获取
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * 设置
     */
    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * 获取
     */
    public function getAttrGroup(): string
    {
        return $this->attrGroup;
    }

    /**
     * 设置
     */
    public function setAttrGroup(string $attrGroup): void
    {
        $this->attrGroup = $attrGroup;
    }
}

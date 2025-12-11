<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeEntity')]
class GoodsTypeEntity
{
    use DTOHelper;

    const string getCatId = 'cat_id';

    const string getCatName = 'cat_name';

    const string getEnabled = 'enabled';

    const string getAttrGroup = 'attr_group';

    #[OA\Property(property: 'catId', description: '', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'catName', description: '', type: 'string')]
    private string $catName;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'attrGroup', description: '', type: 'string')]
    private string $attrGroup;

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

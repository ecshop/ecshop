<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SearchengineEntity')]
class SearchengineEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'date', description: '', type: 'string')]
    protected string $date;

    #[OA\Property(property: 'searchengine', description: '', type: 'string')]
    protected string $searchengine;

    #[OA\Property(property: 'count', description: '', type: 'integer')]
    protected int $count;

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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * 设置
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * 获取
     */
    public function getSearchengine(): string
    {
        return $this->searchengine;
    }

    /**
     * 设置
     */
    public function setSearchengine(string $searchengine): void
    {
        $this->searchengine = $searchengine;
    }

    /**
     * 获取
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * 设置
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }
}

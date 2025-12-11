<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Keywords;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'KeywordsResponse')]
class KeywordsResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'date', description: '', type: 'string')]
    private string $date;

    #[OA\Property(property: 'searchengine', description: '', type: 'string')]
    private string $searchengine;

    #[OA\Property(property: 'keyword', description: '', type: 'string')]
    private string $keyword;

    #[OA\Property(property: 'count', description: '', type: 'integer')]
    private int $count;

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
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * 设置
     */
    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
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

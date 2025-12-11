<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Template;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'TemplateResponse')]
class TemplateResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'filename', description: '', type: 'string')]
    private string $filename;

    #[OA\Property(property: 'region', description: '', type: 'string')]
    private string $region;

    #[OA\Property(property: 'library', description: '', type: 'string')]
    private string $library;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'idValue', description: '', type: 'integer')]
    private int $idValue;

    #[OA\Property(property: 'number', description: '', type: 'integer')]
    private int $number;

    #[OA\Property(property: 'type', description: '', type: 'integer')]
    private int $type;

    #[OA\Property(property: 'theme', description: '', type: 'string')]
    private string $theme;

    #[OA\Property(property: 'remarks', description: '', type: 'string')]
    private string $remarks;

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
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * 设置
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * 获取
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * 设置
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * 获取
     */
    public function getLibrary(): string
    {
        return $this->library;
    }

    /**
     * 设置
     */
    public function setLibrary(string $library): void
    {
        $this->library = $library;
    }

    /**
     * 获取
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * 获取
     */
    public function getIdValue(): int
    {
        return $this->idValue;
    }

    /**
     * 设置
     */
    public function setIdValue(int $idValue): void
    {
        $this->idValue = $idValue;
    }

    /**
     * 获取
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * 设置
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
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
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * 设置
     */
    public function setTheme(string $theme): void
    {
        $this->theme = $theme;
    }

    /**
     * 获取
     */
    public function getRemarks(): string
    {
        return $this->remarks;
    }

    /**
     * 设置
     */
    public function setRemarks(string $remarks): void
    {
        $this->remarks = $remarks;
    }
}

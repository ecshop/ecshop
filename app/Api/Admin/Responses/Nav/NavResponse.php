<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Nav;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'NavResponse')]
class NavResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'ctype', description: '', type: 'string')]
    private string $ctype;

    #[OA\Property(property: 'cid', description: '', type: 'integer')]
    private int $cid;

    #[OA\Property(property: 'name', description: '', type: 'string')]
    private string $name;

    #[OA\Property(property: 'ifshow', description: '', type: 'integer')]
    private int $ifshow;

    #[OA\Property(property: 'vieworder', description: '', type: 'integer')]
    private int $vieworder;

    #[OA\Property(property: 'opennew', description: '', type: 'integer')]
    private int $opennew;

    #[OA\Property(property: 'url', description: '', type: 'string')]
    private string $url;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    private string $type;

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
    public function getCtype(): string
    {
        return $this->ctype;
    }

    /**
     * 设置
     */
    public function setCtype(string $ctype): void
    {
        $this->ctype = $ctype;
    }

    /**
     * 获取
     */
    public function getCid(): int
    {
        return $this->cid;
    }

    /**
     * 设置
     */
    public function setCid(int $cid): void
    {
        $this->cid = $cid;
    }

    /**
     * 获取
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 设置
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * 获取
     */
    public function getIfshow(): int
    {
        return $this->ifshow;
    }

    /**
     * 设置
     */
    public function setIfshow(int $ifshow): void
    {
        $this->ifshow = $ifshow;
    }

    /**
     * 获取
     */
    public function getVieworder(): int
    {
        return $this->vieworder;
    }

    /**
     * 设置
     */
    public function setVieworder(int $vieworder): void
    {
        $this->vieworder = $vieworder;
    }

    /**
     * 获取
     */
    public function getOpennew(): int
    {
        return $this->opennew;
    }

    /**
     * 设置
     */
    public function setOpennew(int $opennew): void
    {
        $this->opennew = $opennew;
    }

    /**
     * 获取
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * 设置
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
}

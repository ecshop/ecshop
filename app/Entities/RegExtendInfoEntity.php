<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RegExtendInfoEntity')]
class RegExtendInfoEntity
{
    use DTOHelper;

    const string getId = 'Id';

    const string getUserId = 'user_id';

    const string getRegFieldId = 'reg_field_id';

    const string getContent = 'content';

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'regFieldId', description: '', type: 'integer')]
    private int $regFieldId;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    private string $content;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getRegFieldId(): int
    {
        return $this->regFieldId;
    }

    /**
     * 设置
     */
    public function setRegFieldId(int $regFieldId): void
    {
        $this->regFieldId = $regFieldId;
    }

    /**
     * 获取
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * 设置
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}

<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailSendlistEntity')]
class EmailSendlistEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'template_id', description: '', type: 'integer')]
    protected int $templateId;

    #[OA\Property(property: 'email_content', description: '', type: 'string')]
    protected string $emailContent;

    #[OA\Property(property: 'error', description: '', type: 'integer')]
    protected int $error;

    #[OA\Property(property: 'pri', description: '', type: 'integer')]
    protected int $pri;

    #[OA\Property(property: 'last_send', description: '', type: 'integer')]
    protected int $lastSend;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getTemplateId(): int
    {
        return $this->templateId;
    }

    /**
     * 设置
     */
    public function setTemplateId(int $templateId): void
    {
        $this->templateId = $templateId;
    }

    /**
     * 获取
     */
    public function getEmailContent(): string
    {
        return $this->emailContent;
    }

    /**
     * 设置
     */
    public function setEmailContent(string $emailContent): void
    {
        $this->emailContent = $emailContent;
    }

    /**
     * 获取
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * 设置
     */
    public function setError(int $error): void
    {
        $this->error = $error;
    }

    /**
     * 获取
     */
    public function getPri(): int
    {
        return $this->pri;
    }

    /**
     * 设置
     */
    public function setPri(int $pri): void
    {
        $this->pri = $pri;
    }

    /**
     * 获取
     */
    public function getLastSend(): int
    {
        return $this->lastSend;
    }

    /**
     * 设置
     */
    public function setLastSend(int $lastSend): void
    {
        $this->lastSend = $lastSend;
    }
}

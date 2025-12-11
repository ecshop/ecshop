<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailSendlistEntity')]
class EmailSendlistEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getEmail = 'email';

    const string getTemplateId = 'template_id';

    const string getEmailContent = 'email_content';

    const string getError = 'error';

    const string getPri = 'pri';

    const string getLastSend = 'last_send';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'templateId', description: '', type: 'integer')]
    private int $templateId;

    #[OA\Property(property: 'emailContent', description: '', type: 'string')]
    private string $emailContent;

    #[OA\Property(property: 'error', description: '', type: 'integer')]
    private int $error;

    #[OA\Property(property: 'pri', description: '', type: 'integer')]
    private int $pri;

    #[OA\Property(property: 'lastSend', description: '', type: 'integer')]
    private int $lastSend;

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

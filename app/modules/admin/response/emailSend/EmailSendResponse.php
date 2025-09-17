<?php

declare(strict_types=1);

namespace app\modules\admin\response\emailSend;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailSendResponse')]
class EmailSendResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '收件人邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'templateId', description: '邮件模板ID', type: 'integer')]
    private int $templateId;

    #[OA\Property(property: 'emailContent', description: '邮件内容', type: 'string')]
    private string $emailContent;

    #[OA\Property(property: 'error', description: '发送错误标记(0成功 1失败)', type: 'integer')]
    private int $error;

    #[OA\Property(property: 'pri', description: '优先级', type: 'integer')]
    private int $pri;

    #[OA\Property(property: 'lastSend', description: '最后发送时间', type: 'integer')]
    private int $lastSend;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTemplateId(): int
    {
        return $this->templateId;
    }

    public function setTemplateId(int $templateId): void
    {
        $this->templateId = $templateId;
    }

    public function getEmailContent(): string
    {
        return $this->emailContent;
    }

    public function setEmailContent(string $emailContent): void
    {
        $this->emailContent = $emailContent;
    }

    public function getError(): int
    {
        return $this->error;
    }

    public function setError(int $error): void
    {
        $this->error = $error;
    }

    public function getPri(): int
    {
        return $this->pri;
    }

    public function setPri(int $pri): void
    {
        $this->pri = $pri;
    }

    public function getLastSend(): int
    {
        return $this->lastSend;
    }

    public function setLastSend(int $lastSend): void
    {
        $this->lastSend = $lastSend;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}

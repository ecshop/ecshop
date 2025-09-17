<?php

declare(strict_types=1);

namespace app\bundles\email\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailSendEntity')]
class EmailSendEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '收件人邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'template_id', description: '邮件模板ID', type: 'integer')]
    private int $template_id;

    #[OA\Property(property: 'email_content', description: '邮件内容', type: 'string')]
    private string $email_content;

    #[OA\Property(property: 'error', description: '发送错误标记(0成功 1失败)', type: 'integer')]
    private int $error;

    #[OA\Property(property: 'pri', description: '优先级', type: 'integer')]
    private int $pri;

    #[OA\Property(property: 'last_send', description: '最后发送时间', type: 'integer')]
    private int $last_send;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->template_id;
    }

    public function setTemplateId(int $templateId): void
    {
        $this->template_id = $templateId;
    }

    public function getEmailContent(): string
    {
        return $this->email_content;
    }

    public function setEmailContent(string $emailContent): void
    {
        $this->email_content = $emailContent;
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
        return $this->last_send;
    }

    public function setLastSend(int $lastSend): void
    {
        $this->last_send = $lastSend;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}

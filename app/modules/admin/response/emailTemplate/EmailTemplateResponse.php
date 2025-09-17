<?php

declare(strict_types=1);

namespace app\modules\admin\response\emailTemplate;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailTemplateResponse')]
class EmailTemplateResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '模板ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'templateCode', description: '模板代码', type: 'string')]
    private string $templateCode;

    #[OA\Property(property: 'isHtml', description: '是否HTML格式(0否1是)', type: 'integer')]
    private int $isHtml;

    #[OA\Property(property: 'templateSubject', description: '邮件主题', type: 'string')]
    private string $templateSubject;

    #[OA\Property(property: 'templateContent', description: '邮件内容', type: 'string')]
    private string $templateContent;

    #[OA\Property(property: 'lastModify', description: '最后修改时间', type: 'integer')]
    private int $lastModify;

    #[OA\Property(property: 'lastSend', description: '最后发送时间', type: 'integer')]
    private int $lastSend;

    #[OA\Property(property: 'type', description: '邮件类型', type: 'string')]
    private string $type;

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

    public function getTemplateCode(): string
    {
        return $this->templateCode;
    }

    public function setTemplateCode(string $templateCode): void
    {
        $this->templateCode = $templateCode;
    }

    public function getIsHtml(): int
    {
        return $this->isHtml;
    }

    public function setIsHtml(int $isHtml): void
    {
        $this->isHtml = $isHtml;
    }

    public function getTemplateSubject(): string
    {
        return $this->templateSubject;
    }

    public function setTemplateSubject(string $templateSubject): void
    {
        $this->templateSubject = $templateSubject;
    }

    public function getTemplateContent(): string
    {
        return $this->templateContent;
    }

    public function setTemplateContent(string $templateContent): void
    {
        $this->templateContent = $templateContent;
    }

    public function getLastModify(): int
    {
        return $this->lastModify;
    }

    public function setLastModify(int $lastModify): void
    {
        $this->lastModify = $lastModify;
    }

    public function getLastSend(): int
    {
        return $this->lastSend;
    }

    public function setLastSend(int $lastSend): void
    {
        $this->lastSend = $lastSend;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
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

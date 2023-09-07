<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'MailTemplateSchema')]
class MailTemplate
{
    use ArrayObject;

    #[OA\Property(property: 'template_id', description: '', type: 'integer')]
    protected int $templateId;

    #[OA\Property(property: 'template_code', description: '', type: 'string')]
    protected string $templateCode;

    #[OA\Property(property: 'is_html', description: '', type: 'integer')]
    protected int $isHtml;

    #[OA\Property(property: 'template_subject', description: '', type: 'string')]
    protected string $templateSubject;

    #[OA\Property(property: 'template_content', description: '', type: 'string')]
    protected string $templateContent;

    #[OA\Property(property: 'last_modify', description: '', type: 'integer')]
    protected int $lastModify;

    #[OA\Property(property: 'last_send', description: '', type: 'integer')]
    protected int $lastSend;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    protected string $type;

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
    public function getTemplateCode(): string
    {
        return $this->templateCode;
    }

    /**
     * 设置
     */
    public function setTemplateCode(string $templateCode): void
    {
        $this->templateCode = $templateCode;
    }

    /**
     * 获取
     */
    public function getIsHtml(): int
    {
        return $this->isHtml;
    }

    /**
     * 设置
     */
    public function setIsHtml(int $isHtml): void
    {
        $this->isHtml = $isHtml;
    }

    /**
     * 获取
     */
    public function getTemplateSubject(): string
    {
        return $this->templateSubject;
    }

    /**
     * 设置
     */
    public function setTemplateSubject(string $templateSubject): void
    {
        $this->templateSubject = $templateSubject;
    }

    /**
     * 获取
     */
    public function getTemplateContent(): string
    {
        return $this->templateContent;
    }

    /**
     * 设置
     */
    public function setTemplateContent(string $templateContent): void
    {
        $this->templateContent = $templateContent;
    }

    /**
     * 获取
     */
    public function getLastModify(): int
    {
        return $this->lastModify;
    }

    /**
     * 设置
     */
    public function setLastModify(int $lastModify): void
    {
        $this->lastModify = $lastModify;
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

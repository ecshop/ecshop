<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'MailTemplatesEntity')]
class MailTemplatesEntity
{
    use DTOHelper;

    const string getTemplateId = 'template_id';

    const string getTemplateCode = 'template_code';

    const string getIsHtml = 'is_html';

    const string getTemplateSubject = 'template_subject';

    const string getTemplateContent = 'template_content';

    const string getLastModify = 'last_modify';

    const string getLastSend = 'last_send';

    const string getType = 'type';

    #[OA\Property(property: 'templateId', description: '', type: 'integer')]
    private int $templateId;

    #[OA\Property(property: 'templateCode', description: '', type: 'string')]
    private string $templateCode;

    #[OA\Property(property: 'isHtml', description: '', type: 'integer')]
    private int $isHtml;

    #[OA\Property(property: 'templateSubject', description: '', type: 'string')]
    private string $templateSubject;

    #[OA\Property(property: 'templateContent', description: '', type: 'string')]
    private string $templateContent;

    #[OA\Property(property: 'lastModify', description: '', type: 'integer')]
    private int $lastModify;

    #[OA\Property(property: 'lastSend', description: '', type: 'integer')]
    private int $lastSend;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    private string $type;

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

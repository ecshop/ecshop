<?php

declare(strict_types=1);

namespace app\bundles\email\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailTemplateEntity')]
class EmailTemplateEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '模板ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'template_code', description: '模板代码', type: 'string')]
    private string $template_code;

    #[OA\Property(property: 'is_html', description: '是否HTML格式(0否1是)', type: 'integer')]
    private int $is_html;

    #[OA\Property(property: 'template_subject', description: '邮件主题', type: 'string')]
    private string $template_subject;

    #[OA\Property(property: 'template_content', description: '邮件内容', type: 'string')]
    private string $template_content;

    #[OA\Property(property: 'last_modify', description: '最后修改时间', type: 'integer')]
    private int $last_modify;

    #[OA\Property(property: 'last_send', description: '最后发送时间', type: 'integer')]
    private int $last_send;

    #[OA\Property(property: 'type', description: '邮件类型', type: 'string')]
    private string $type;

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

    public function getTemplateCode(): string
    {
        return $this->template_code;
    }

    public function setTemplateCode(string $templateCode): void
    {
        $this->template_code = $templateCode;
    }

    public function getIsHtml(): int
    {
        return $this->is_html;
    }

    public function setIsHtml(int $isHtml): void
    {
        $this->is_html = $isHtml;
    }

    public function getTemplateSubject(): string
    {
        return $this->template_subject;
    }

    public function setTemplateSubject(string $templateSubject): void
    {
        $this->template_subject = $templateSubject;
    }

    public function getTemplateContent(): string
    {
        return $this->template_content;
    }

    public function setTemplateContent(string $templateContent): void
    {
        $this->template_content = $templateContent;
    }

    public function getLastModify(): int
    {
        return $this->last_modify;
    }

    public function setLastModify(int $lastModify): void
    {
        $this->last_modify = $lastModify;
    }

    public function getLastSend(): int
    {
        return $this->last_send;
    }

    public function setLastSend(int $lastSend): void
    {
        $this->last_send = $lastSend;
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

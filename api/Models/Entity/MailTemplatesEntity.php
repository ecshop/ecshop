<?php

namespace App\Models\Entity;

/**
 * Class MailTemplatesEntity
 * @package App\Models\Entity
 */
class MailTemplatesEntity
{
    /**
     * @var int 
     */
    private int $template_id;

    /**
     * @var string 
     */
    private string $template_code;

    /**
     * @var int 
     */
    private int $is_html;

    /**
     * @var string 
     */
    private string $template_subject;

    /**
     * @var string 
     */
    private string $template_content;

    /**
     * @var int 
     */
    private int $last_modify;

    /**
     * @var int 
     */
    private int $last_send;

    /**
     * @var string 
     */
    private string $type;

    /**
     * @return int
     */
    public function getTemplateId(): int
    {
        return $this->template_id;
    }

    /**
     * @param int $value
     */
    public function setTemplateId(int $value)
    {
        $this->template_id = $value;
    }

    /**
     * @return string
     */
    public function getTemplateCode(): string
    {
        return $this->template_code;
    }

    /**
     * @param string $value
     */
    public function setTemplateCode(string $value)
    {
        $this->template_code = $value;
    }

    /**
     * @return int
     */
    public function getIsHtml(): int
    {
        return $this->is_html;
    }

    /**
     * @param int $value
     */
    public function setIsHtml(int $value)
    {
        $this->is_html = $value;
    }

    /**
     * @return string
     */
    public function getTemplateSubject(): string
    {
        return $this->template_subject;
    }

    /**
     * @param string $value
     */
    public function setTemplateSubject(string $value)
    {
        $this->template_subject = $value;
    }

    /**
     * @return string
     */
    public function getTemplateContent(): string
    {
        return $this->template_content;
    }

    /**
     * @param string $value
     */
    public function setTemplateContent(string $value)
    {
        $this->template_content = $value;
    }

    /**
     * @return int
     */
    public function getLastModify(): int
    {
        return $this->last_modify;
    }

    /**
     * @param int $value
     */
    public function setLastModify(int $value)
    {
        $this->last_modify = $value;
    }

    /**
     * @return int
     */
    public function getLastSend(): int
    {
        return $this->last_send;
    }

    /**
     * @param int $value
     */
    public function setLastSend(int $value)
    {
        $this->last_send = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value)
    {
        $this->type = $value;
    }

}

<?php

namespace App\Models\Entity;

/**
 * Class EmailSendlistEntity
 * @package App\Models\Entity
 */
class EmailSendlistEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var int 
     */
    private int $template_id;

    /**
     * @var string 
     */
    private string $email_content;

    /**
     * @var int 
     */
    private int $error;

    /**
     * @var int 
     */
    private int $pri;

    /**
     * @var int 
     */
    private int $last_send;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value)
    {
        $this->email = $value;
    }

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
    public function getEmailContent(): string
    {
        return $this->email_content;
    }

    /**
     * @param string $value
     */
    public function setEmailContent(string $value)
    {
        $this->email_content = $value;
    }

    /**
     * @return int
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * @param int $value
     */
    public function setError(int $value)
    {
        $this->error = $value;
    }

    /**
     * @return int
     */
    public function getPri(): int
    {
        return $this->pri;
    }

    /**
     * @param int $value
     */
    public function setPri(int $value)
    {
        $this->pri = $value;
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

}

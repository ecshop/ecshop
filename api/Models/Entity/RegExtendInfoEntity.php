<?php

namespace App\Models\Entity;

/**
 * Class RegExtendInfoEntity
 * @package App\Models\Entity
 */
class RegExtendInfoEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var int 
     */
    private int $reg_field_id;

    /**
     * @var string 
     */
    private string $content;

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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return int
     */
    public function getRegFieldId(): int
    {
        return $this->reg_field_id;
    }

    /**
     * @param int $value
     */
    public function setRegFieldId(int $value)
    {
        $this->reg_field_id = $value;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $value
     */
    public function setContent(string $value)
    {
        $this->content = $value;
    }

}

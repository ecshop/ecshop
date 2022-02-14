<?php

namespace App\Models\Entity;

/**
 * Class CommentEntity
 * @package App\Models\Entity
 */
class CommentEntity
{
    /**
     * @var int 
     */
    private int $comment_id;

    /**
     * @var int 
     */
    private int $comment_type;

    /**
     * @var int 
     */
    private int $id_value;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var string 
     */
    private string $user_name;

    /**
     * @var string 
     */
    private string $content;

    /**
     * @var int 
     */
    private int $comment_rank;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var string 
     */
    private string $ip_address;

    /**
     * @var int 
     */
    private int $status;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->comment_id;
    }

    /**
     * @param int $value
     */
    public function setCommentId(int $value)
    {
        $this->comment_id = $value;
    }

    /**
     * @return int
     */
    public function getCommentType(): int
    {
        return $this->comment_type;
    }

    /**
     * @param int $value
     */
    public function setCommentType(int $value)
    {
        $this->comment_type = $value;
    }

    /**
     * @return int
     */
    public function getIdValue(): int
    {
        return $this->id_value;
    }

    /**
     * @param int $value
     */
    public function setIdValue(int $value)
    {
        $this->id_value = $value;
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
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $value
     */
    public function setUserName(string $value)
    {
        $this->user_name = $value;
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

    /**
     * @return int
     */
    public function getCommentRank(): int
    {
        return $this->comment_rank;
    }

    /**
     * @param int $value
     */
    public function setCommentRank(int $value)
    {
        $this->comment_rank = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    /**
     * @param string $value
     */
    public function setIpAddress(string $value)
    {
        $this->ip_address = $value;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $value
     */
    public function setStatus(int $value)
    {
        $this->status = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
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

}

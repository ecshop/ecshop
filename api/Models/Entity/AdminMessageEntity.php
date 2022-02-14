<?php

namespace App\Models\Entity;

/**
 * Class AdminMessageEntity
 * @package App\Models\Entity
 */
class AdminMessageEntity
{
    /**
     * @var int 
     */
    private int $message_id;

    /**
     * @var int 
     */
    private int $sender_id;

    /**
     * @var int 
     */
    private int $receiver_id;

    /**
     * @var int 
     */
    private int $sent_time;

    /**
     * @var int 
     */
    private int $read_time;

    /**
     * @var int 
     */
    private int $readed;

    /**
     * @var int 
     */
    private int $deleted;

    /**
     * @var string 
     */
    private string $title;

    /**
     * @var string 
     */
    private string $message;

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $value
     */
    public function setMessageId(int $value)
    {
        $this->message_id = $value;
    }

    /**
     * @return int
     */
    public function getSenderId(): int
    {
        return $this->sender_id;
    }

    /**
     * @param int $value
     */
    public function setSenderId(int $value)
    {
        $this->sender_id = $value;
    }

    /**
     * @return int
     */
    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    /**
     * @param int $value
     */
    public function setReceiverId(int $value)
    {
        $this->receiver_id = $value;
    }

    /**
     * @return int
     */
    public function getSentTime(): int
    {
        return $this->sent_time;
    }

    /**
     * @param int $value
     */
    public function setSentTime(int $value)
    {
        $this->sent_time = $value;
    }

    /**
     * @return int
     */
    public function getReadTime(): int
    {
        return $this->read_time;
    }

    /**
     * @param int $value
     */
    public function setReadTime(int $value)
    {
        $this->read_time = $value;
    }

    /**
     * @return int
     */
    public function getReaded(): int
    {
        return $this->readed;
    }

    /**
     * @param int $value
     */
    public function setReaded(int $value)
    {
        $this->readed = $value;
    }

    /**
     * @return int
     */
    public function getDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * @param int $value
     */
    public function setDeleted(int $value)
    {
        $this->deleted = $value;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value)
    {
        $this->title = $value;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $value
     */
    public function setMessage(string $value)
    {
        $this->message = $value;
    }

}

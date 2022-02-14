<?php

namespace App\Models\Entity;

/**
 * Class FeedbackEntity
 * @package App\Models\Entity
 */
class FeedbackEntity
{
    /**
     * @var int 
     */
    private int $msg_id;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $user_name;

    /**
     * @var string 
     */
    private string $user_email;

    /**
     * @var string 
     */
    private string $msg_title;

    /**
     * @var int 
     */
    private int $msg_type;

    /**
     * @var int 
     */
    private int $msg_status;

    /**
     * @var string 
     */
    private string $msg_content;

    /**
     * @var int 
     */
    private int $msg_time;

    /**
     * @var string 
     */
    private string $message_img;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var int 
     */
    private int $msg_area;

    /**
     * @return int
     */
    public function getMsgId(): int
    {
        return $this->msg_id;
    }

    /**
     * @param int $value
     */
    public function setMsgId(int $value)
    {
        $this->msg_id = $value;
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
    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    /**
     * @param string $value
     */
    public function setUserEmail(string $value)
    {
        $this->user_email = $value;
    }

    /**
     * @return string
     */
    public function getMsgTitle(): string
    {
        return $this->msg_title;
    }

    /**
     * @param string $value
     */
    public function setMsgTitle(string $value)
    {
        $this->msg_title = $value;
    }

    /**
     * @return int
     */
    public function getMsgType(): int
    {
        return $this->msg_type;
    }

    /**
     * @param int $value
     */
    public function setMsgType(int $value)
    {
        $this->msg_type = $value;
    }

    /**
     * @return int
     */
    public function getMsgStatus(): int
    {
        return $this->msg_status;
    }

    /**
     * @param int $value
     */
    public function setMsgStatus(int $value)
    {
        $this->msg_status = $value;
    }

    /**
     * @return string
     */
    public function getMsgContent(): string
    {
        return $this->msg_content;
    }

    /**
     * @param string $value
     */
    public function setMsgContent(string $value)
    {
        $this->msg_content = $value;
    }

    /**
     * @return int
     */
    public function getMsgTime(): int
    {
        return $this->msg_time;
    }

    /**
     * @param int $value
     */
    public function setMsgTime(int $value)
    {
        $this->msg_time = $value;
    }

    /**
     * @return string
     */
    public function getMessageImg(): string
    {
        return $this->message_img;
    }

    /**
     * @param string $value
     */
    public function setMessageImg(string $value)
    {
        $this->message_img = $value;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $value
     */
    public function setOrderId(int $value)
    {
        $this->order_id = $value;
    }

    /**
     * @return int
     */
    public function getMsgArea(): int
    {
        return $this->msg_area;
    }

    /**
     * @param int $value
     */
    public function setMsgArea(int $value)
    {
        $this->msg_area = $value;
    }

}

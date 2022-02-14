<?php

namespace App\Models\Entity;

/**
 * Class BookingGoodsEntity
 * @package App\Models\Entity
 */
class BookingGoodsEntity
{
    /**
     * @var int 
     */
    private int $rec_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var string 
     */
    private string $link_man;

    /**
     * @var string 
     */
    private string $tel;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $goods_desc;

    /**
     * @var int 
     */
    private int $goods_number;

    /**
     * @var int 
     */
    private int $booking_time;

    /**
     * @var int 
     */
    private int $is_dispose;

    /**
     * @var string 
     */
    private string $dispose_user;

    /**
     * @var int 
     */
    private int $dispose_time;

    /**
     * @var string 
     */
    private string $dispose_note;

    /**
     * @return int
     */
    public function getRecId(): int
    {
        return $this->rec_id;
    }

    /**
     * @param int $value
     */
    public function setRecId(int $value)
    {
        $this->rec_id = $value;
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
    public function getLinkMan(): string
    {
        return $this->link_man;
    }

    /**
     * @param string $value
     */
    public function setLinkMan(string $value)
    {
        $this->link_man = $value;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @param string $value
     */
    public function setTel(string $value)
    {
        $this->tel = $value;
    }

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return string
     */
    public function getGoodsDesc(): string
    {
        return $this->goods_desc;
    }

    /**
     * @param string $value
     */
    public function setGoodsDesc(string $value)
    {
        $this->goods_desc = $value;
    }

    /**
     * @return int
     */
    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    /**
     * @param int $value
     */
    public function setGoodsNumber(int $value)
    {
        $this->goods_number = $value;
    }

    /**
     * @return int
     */
    public function getBookingTime(): int
    {
        return $this->booking_time;
    }

    /**
     * @param int $value
     */
    public function setBookingTime(int $value)
    {
        $this->booking_time = $value;
    }

    /**
     * @return int
     */
    public function getIsDispose(): int
    {
        return $this->is_dispose;
    }

    /**
     * @param int $value
     */
    public function setIsDispose(int $value)
    {
        $this->is_dispose = $value;
    }

    /**
     * @return string
     */
    public function getDisposeUser(): string
    {
        return $this->dispose_user;
    }

    /**
     * @param string $value
     */
    public function setDisposeUser(string $value)
    {
        $this->dispose_user = $value;
    }

    /**
     * @return int
     */
    public function getDisposeTime(): int
    {
        return $this->dispose_time;
    }

    /**
     * @param int $value
     */
    public function setDisposeTime(int $value)
    {
        $this->dispose_time = $value;
    }

    /**
     * @return string
     */
    public function getDisposeNote(): string
    {
        return $this->dispose_note;
    }

    /**
     * @param string $value
     */
    public function setDisposeNote(string $value)
    {
        $this->dispose_note = $value;
    }

}

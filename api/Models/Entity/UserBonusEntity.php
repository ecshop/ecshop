<?php

namespace App\Models\Entity;

/**
 * Class UserBonusEntity
 * @package App\Models\Entity
 */
class UserBonusEntity
{
    /**
     * @var int 
     */
    private int $bonus_id;

    /**
     * @var int 
     */
    private int $bonus_type_id;

    /**
     * @var int 
     */
    private int $bonus_sn;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var int 
     */
    private int $used_time;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var int 
     */
    private int $emailed;

    /**
     * @return int
     */
    public function getBonusId(): int
    {
        return $this->bonus_id;
    }

    /**
     * @param int $value
     */
    public function setBonusId(int $value)
    {
        $this->bonus_id = $value;
    }

    /**
     * @return int
     */
    public function getBonusTypeId(): int
    {
        return $this->bonus_type_id;
    }

    /**
     * @param int $value
     */
    public function setBonusTypeId(int $value)
    {
        $this->bonus_type_id = $value;
    }

    /**
     * @return int
     */
    public function getBonusSn(): int
    {
        return $this->bonus_sn;
    }

    /**
     * @param int $value
     */
    public function setBonusSn(int $value)
    {
        $this->bonus_sn = $value;
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
    public function getUsedTime(): int
    {
        return $this->used_time;
    }

    /**
     * @param int $value
     */
    public function setUsedTime(int $value)
    {
        $this->used_time = $value;
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
    public function getEmailed(): int
    {
        return $this->emailed;
    }

    /**
     * @param int $value
     */
    public function setEmailed(int $value)
    {
        $this->emailed = $value;
    }

}

<?php

namespace App\Models\Entity;

/**
 * Class AutoManageEntity
 * @package App\Models\Entity
 */
class AutoManageEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $item_id;

    /**
     * @var string 
     */
    private string $type;

    /**
     * @var int 
     */
    private int $starttime;

    /**
     * @var int 
     */
    private int $endtime;

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
    public function getItemId(): int
    {
        return $this->item_id;
    }

    /**
     * @param int $value
     */
    public function setItemId(int $value)
    {
        $this->item_id = $value;
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

    /**
     * @return int
     */
    public function getStarttime(): int
    {
        return $this->starttime;
    }

    /**
     * @param int $value
     */
    public function setStarttime(int $value)
    {
        $this->starttime = $value;
    }

    /**
     * @return int
     */
    public function getEndtime(): int
    {
        return $this->endtime;
    }

    /**
     * @param int $value
     */
    public function setEndtime(int $value)
    {
        $this->endtime = $value;
    }

}

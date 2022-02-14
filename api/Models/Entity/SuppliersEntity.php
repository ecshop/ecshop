<?php

namespace App\Models\Entity;

/**
 * Class SuppliersEntity
 * @package App\Models\Entity
 */
class SuppliersEntity
{
    /**
     * @var int 
     */
    private int $suppliers_id;

    /**
     * @var string 
     */
    private string $suppliers_name;

    /**
     * @var string 
     */
    private string $suppliers_desc;

    /**
     * @var int 
     */
    private int $is_check;

    /**
     * @return int
     */
    public function getSuppliersId(): int
    {
        return $this->suppliers_id;
    }

    /**
     * @param int $value
     */
    public function setSuppliersId(int $value)
    {
        $this->suppliers_id = $value;
    }

    /**
     * @return string
     */
    public function getSuppliersName(): string
    {
        return $this->suppliers_name;
    }

    /**
     * @param string $value
     */
    public function setSuppliersName(string $value)
    {
        $this->suppliers_name = $value;
    }

    /**
     * @return string
     */
    public function getSuppliersDesc(): string
    {
        return $this->suppliers_desc;
    }

    /**
     * @param string $value
     */
    public function setSuppliersDesc(string $value)
    {
        $this->suppliers_desc = $value;
    }

    /**
     * @return int
     */
    public function getIsCheck(): int
    {
        return $this->is_check;
    }

    /**
     * @param int $value
     */
    public function setIsCheck(int $value)
    {
        $this->is_check = $value;
    }

}

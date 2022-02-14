<?php

namespace App\Models\Entity;

/**
 * Class RegFieldsEntity
 * @package App\Models\Entity
 */
class RegFieldsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $reg_field_name;

    /**
     * @var int 
     */
    private int $dis_order;

    /**
     * @var int 
     */
    private int $display;

    /**
     * @var int 
     */
    private int $type;

    /**
     * @var int 
     */
    private int $is_need;

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
    public function getRegFieldName(): string
    {
        return $this->reg_field_name;
    }

    /**
     * @param string $value
     */
    public function setRegFieldName(string $value)
    {
        $this->reg_field_name = $value;
    }

    /**
     * @return int
     */
    public function getDisOrder(): int
    {
        return $this->dis_order;
    }

    /**
     * @param int $value
     */
    public function setDisOrder(int $value)
    {
        $this->dis_order = $value;
    }

    /**
     * @return int
     */
    public function getDisplay(): int
    {
        return $this->display;
    }

    /**
     * @param int $value
     */
    public function setDisplay(int $value)
    {
        $this->display = $value;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $value
     */
    public function setType(int $value)
    {
        $this->type = $value;
    }

    /**
     * @return int
     */
    public function getIsNeed(): int
    {
        return $this->is_need;
    }

    /**
     * @param int $value
     */
    public function setIsNeed(int $value)
    {
        $this->is_need = $value;
    }

}

<?php

namespace App\Models\Entity;

/**
 * Class TemplateEntity
 * @package App\Models\Entity
 */
class TemplateEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $filename;

    /**
     * @var string 
     */
    private string $region;

    /**
     * @var string 
     */
    private string $library;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @var int 
     */
    private int $id_value;

    /**
     * @var int 
     */
    private int $number;

    /**
     * @var int 
     */
    private int $type;

    /**
     * @var string 
     */
    private string $theme;

    /**
     * @var string 
     */
    private string $remarks;

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
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $value
     */
    public function setFilename(string $value)
    {
        $this->filename = $value;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $value
     */
    public function setRegion(string $value)
    {
        $this->region = $value;
    }

    /**
     * @return string
     */
    public function getLibrary(): string
    {
        return $this->library;
    }

    /**
     * @param string $value
     */
    public function setLibrary(string $value)
    {
        $this->library = $value;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
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
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $value
     */
    public function setNumber(int $value)
    {
        $this->number = $value;
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
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @param string $value
     */
    public function setTheme(string $value)
    {
        $this->theme = $value;
    }

    /**
     * @return string
     */
    public function getRemarks(): string
    {
        return $this->remarks;
    }

    /**
     * @param string $value
     */
    public function setRemarks(string $value)
    {
        $this->remarks = $value;
    }

}

<?php

namespace App\Models\Entity;

/**
 * Class PluginsEntity
 * @package App\Models\Entity
 */
class PluginsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $code;

    /**
     * @var string 
     */
    private string $version;

    /**
     * @var string 
     */
    private string $library;

    /**
     * @var int 
     */
    private int $assign;

    /**
     * @var int 
     */
    private int $install_date;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $value
     */
    public function setCode(string $value)
    {
        $this->code = $value;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $value
     */
    public function setVersion(string $value)
    {
        $this->version = $value;
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
    public function getAssign(): int
    {
        return $this->assign;
    }

    /**
     * @param int $value
     */
    public function setAssign(int $value)
    {
        $this->assign = $value;
    }

    /**
     * @return int
     */
    public function getInstallDate(): int
    {
        return $this->install_date;
    }

    /**
     * @param int $value
     */
    public function setInstallDate(int $value)
    {
        $this->install_date = $value;
    }

}

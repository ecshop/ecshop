<?php

namespace App\Models\Entity;

/**
 * Class NavEntity
 * @package App\Models\Entity
 */
class NavEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $ctype;

    /**
     * @var int 
     */
    private int $cid;

    /**
     * @var string 
     */
    private string $name;

    /**
     * @var int 
     */
    private int $ifshow;

    /**
     * @var int 
     */
    private int $vieworder;

    /**
     * @var int 
     */
    private int $opennew;

    /**
     * @var string 
     */
    private string $url;

    /**
     * @var string 
     */
    private string $type;

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
    public function getCtype(): string
    {
        return $this->ctype;
    }

    /**
     * @param string $value
     */
    public function setCtype(string $value)
    {
        $this->ctype = $value;
    }

    /**
     * @return int
     */
    public function getCid(): int
    {
        return $this->cid;
    }

    /**
     * @param int $value
     */
    public function setCid(int $value)
    {
        $this->cid = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value)
    {
        $this->name = $value;
    }

    /**
     * @return int
     */
    public function getIfshow(): int
    {
        return $this->ifshow;
    }

    /**
     * @param int $value
     */
    public function setIfshow(int $value)
    {
        $this->ifshow = $value;
    }

    /**
     * @return int
     */
    public function getVieworder(): int
    {
        return $this->vieworder;
    }

    /**
     * @param int $value
     */
    public function setVieworder(int $value)
    {
        $this->vieworder = $value;
    }

    /**
     * @return int
     */
    public function getOpennew(): int
    {
        return $this->opennew;
    }

    /**
     * @param int $value
     */
    public function setOpennew(int $value)
    {
        $this->opennew = $value;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value)
    {
        $this->url = $value;
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

}

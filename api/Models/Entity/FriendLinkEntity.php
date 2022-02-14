<?php

namespace App\Models\Entity;

/**
 * Class FriendLinkEntity
 * @package App\Models\Entity
 */
class FriendLinkEntity
{
    /**
     * @var int 
     */
    private int $link_id;

    /**
     * @var string 
     */
    private string $link_name;

    /**
     * @var string 
     */
    private string $link_url;

    /**
     * @var string 
     */
    private string $link_logo;

    /**
     * @var int 
     */
    private int $show_order;

    /**
     * @return int
     */
    public function getLinkId(): int
    {
        return $this->link_id;
    }

    /**
     * @param int $value
     */
    public function setLinkId(int $value)
    {
        $this->link_id = $value;
    }

    /**
     * @return string
     */
    public function getLinkName(): string
    {
        return $this->link_name;
    }

    /**
     * @param string $value
     */
    public function setLinkName(string $value)
    {
        $this->link_name = $value;
    }

    /**
     * @return string
     */
    public function getLinkUrl(): string
    {
        return $this->link_url;
    }

    /**
     * @param string $value
     */
    public function setLinkUrl(string $value)
    {
        $this->link_url = $value;
    }

    /**
     * @return string
     */
    public function getLinkLogo(): string
    {
        return $this->link_logo;
    }

    /**
     * @param string $value
     */
    public function setLinkLogo(string $value)
    {
        $this->link_logo = $value;
    }

    /**
     * @return int
     */
    public function getShowOrder(): int
    {
        return $this->show_order;
    }

    /**
     * @param int $value
     */
    public function setShowOrder(int $value)
    {
        $this->show_order = $value;
    }

}

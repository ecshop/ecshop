<?php

namespace App\Models\Entity;

/**
 * Class ShippingEntity
 * @package App\Models\Entity
 */
class ShippingEntity
{
    /**
     * @var int 
     */
    private int $shipping_id;

    /**
     * @var string 
     */
    private string $shipping_code;

    /**
     * @var string 
     */
    private string $shipping_name;

    /**
     * @var string 
     */
    private string $shipping_desc;

    /**
     * @var string 
     */
    private string $insure;

    /**
     * @var int 
     */
    private int $support_cod;

    /**
     * @var int 
     */
    private int $enabled;

    /**
     * @var string 
     */
    private string $shipping_print;

    /**
     * @var string 
     */
    private string $print_bg;

    /**
     * @var string 
     */
    private string $config_lable;

    /**
     * @var int 
     */
    private int $print_model;

    /**
     * @var int 
     */
    private int $shipping_order;

    /**
     * @return int
     */
    public function getShippingId(): int
    {
        return $this->shipping_id;
    }

    /**
     * @param int $value
     */
    public function setShippingId(int $value)
    {
        $this->shipping_id = $value;
    }

    /**
     * @return string
     */
    public function getShippingCode(): string
    {
        return $this->shipping_code;
    }

    /**
     * @param string $value
     */
    public function setShippingCode(string $value)
    {
        $this->shipping_code = $value;
    }

    /**
     * @return string
     */
    public function getShippingName(): string
    {
        return $this->shipping_name;
    }

    /**
     * @param string $value
     */
    public function setShippingName(string $value)
    {
        $this->shipping_name = $value;
    }

    /**
     * @return string
     */
    public function getShippingDesc(): string
    {
        return $this->shipping_desc;
    }

    /**
     * @param string $value
     */
    public function setShippingDesc(string $value)
    {
        $this->shipping_desc = $value;
    }

    /**
     * @return string
     */
    public function getInsure(): string
    {
        return $this->insure;
    }

    /**
     * @param string $value
     */
    public function setInsure(string $value)
    {
        $this->insure = $value;
    }

    /**
     * @return int
     */
    public function getSupportCod(): int
    {
        return $this->support_cod;
    }

    /**
     * @param int $value
     */
    public function setSupportCod(int $value)
    {
        $this->support_cod = $value;
    }

    /**
     * @return int
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $value
     */
    public function setEnabled(int $value)
    {
        $this->enabled = $value;
    }

    /**
     * @return string
     */
    public function getShippingPrint(): string
    {
        return $this->shipping_print;
    }

    /**
     * @param string $value
     */
    public function setShippingPrint(string $value)
    {
        $this->shipping_print = $value;
    }

    /**
     * @return string
     */
    public function getPrintBg(): string
    {
        return $this->print_bg;
    }

    /**
     * @param string $value
     */
    public function setPrintBg(string $value)
    {
        $this->print_bg = $value;
    }

    /**
     * @return string
     */
    public function getConfigLable(): string
    {
        return $this->config_lable;
    }

    /**
     * @param string $value
     */
    public function setConfigLable(string $value)
    {
        $this->config_lable = $value;
    }

    /**
     * @return int
     */
    public function getPrintModel(): int
    {
        return $this->print_model;
    }

    /**
     * @param int $value
     */
    public function setPrintModel(int $value)
    {
        $this->print_model = $value;
    }

    /**
     * @return int
     */
    public function getShippingOrder(): int
    {
        return $this->shipping_order;
    }

    /**
     * @param int $value
     */
    public function setShippingOrder(int $value)
    {
        $this->shipping_order = $value;
    }

}

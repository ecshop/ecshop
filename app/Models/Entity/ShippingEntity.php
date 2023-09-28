<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingEntity')]
class ShippingEntity
{
    use ArrayObject;

    #[OA\Property(property: 'shipping_id', description: '', type: 'integer')]
    protected int $shippingId;

    #[OA\Property(property: 'shipping_code', description: '', type: 'string')]
    protected string $shippingCode;

    #[OA\Property(property: 'shipping_name', description: '', type: 'string')]
    protected string $shippingName;

    #[OA\Property(property: 'shipping_desc', description: '', type: 'string')]
    protected string $shippingDesc;

    #[OA\Property(property: 'insure', description: '', type: 'string')]
    protected string $insure;

    #[OA\Property(property: 'support_cod', description: '', type: 'integer')]
    protected int $supportCod;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    protected int $enabled;

    #[OA\Property(property: 'shipping_print', description: '', type: 'string')]
    protected string $shippingPrint;

    #[OA\Property(property: 'print_bg', description: '', type: 'string')]
    protected string $printBg;

    #[OA\Property(property: 'config_lable', description: '', type: 'string')]
    protected string $configLable;

    #[OA\Property(property: 'print_model', description: '', type: 'integer')]
    protected int $printModel;

    #[OA\Property(property: 'shipping_order', description: '', type: 'integer')]
    protected int $shippingOrder;

    /**
     * 获取
     */
    public function getShippingId(): int
    {
        return $this->shippingId;
    }

    /**
     * 设置
     */
    public function setShippingId(int $shippingId): void
    {
        $this->shippingId = $shippingId;
    }

    /**
     * 获取
     */
    public function getShippingCode(): string
    {
        return $this->shippingCode;
    }

    /**
     * 设置
     */
    public function setShippingCode(string $shippingCode): void
    {
        $this->shippingCode = $shippingCode;
    }

    /**
     * 获取
     */
    public function getShippingName(): string
    {
        return $this->shippingName;
    }

    /**
     * 设置
     */
    public function setShippingName(string $shippingName): void
    {
        $this->shippingName = $shippingName;
    }

    /**
     * 获取
     */
    public function getShippingDesc(): string
    {
        return $this->shippingDesc;
    }

    /**
     * 设置
     */
    public function setShippingDesc(string $shippingDesc): void
    {
        $this->shippingDesc = $shippingDesc;
    }

    /**
     * 获取
     */
    public function getInsure(): string
    {
        return $this->insure;
    }

    /**
     * 设置
     */
    public function setInsure(string $insure): void
    {
        $this->insure = $insure;
    }

    /**
     * 获取
     */
    public function getSupportCod(): int
    {
        return $this->supportCod;
    }

    /**
     * 设置
     */
    public function setSupportCod(int $supportCod): void
    {
        $this->supportCod = $supportCod;
    }

    /**
     * 获取
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * 设置
     */
    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * 获取
     */
    public function getShippingPrint(): string
    {
        return $this->shippingPrint;
    }

    /**
     * 设置
     */
    public function setShippingPrint(string $shippingPrint): void
    {
        $this->shippingPrint = $shippingPrint;
    }

    /**
     * 获取
     */
    public function getPrintBg(): string
    {
        return $this->printBg;
    }

    /**
     * 设置
     */
    public function setPrintBg(string $printBg): void
    {
        $this->printBg = $printBg;
    }

    /**
     * 获取
     */
    public function getConfigLable(): string
    {
        return $this->configLable;
    }

    /**
     * 设置
     */
    public function setConfigLable(string $configLable): void
    {
        $this->configLable = $configLable;
    }

    /**
     * 获取
     */
    public function getPrintModel(): int
    {
        return $this->printModel;
    }

    /**
     * 设置
     */
    public function setPrintModel(int $printModel): void
    {
        $this->printModel = $printModel;
    }

    /**
     * 获取
     */
    public function getShippingOrder(): int
    {
        return $this->shippingOrder;
    }

    /**
     * 设置
     */
    public function setShippingOrder(int $shippingOrder): void
    {
        $this->shippingOrder = $shippingOrder;
    }
}

<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingEntity')]
class ShippingEntity
{
    use DTOHelper;

    const string getShippingId = 'shipping_id';

    const string getShippingCode = 'shipping_code';

    const string getShippingName = 'shipping_name';

    const string getShippingDesc = 'shipping_desc';

    const string getInsure = 'insure';

    const string getSupportCod = 'support_cod';

    const string getEnabled = 'enabled';

    const string getShippingPrint = 'shipping_print';

    const string getPrintBg = 'print_bg';

    const string getConfigLable = 'config_lable';

    const string getPrintModel = 'print_model';

    const string getShippingOrder = 'shipping_order';

    #[OA\Property(property: 'shippingId', description: '', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'shippingCode', description: '', type: 'string')]
    private string $shippingCode;

    #[OA\Property(property: 'shippingName', description: '', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'shippingDesc', description: '', type: 'string')]
    private string $shippingDesc;

    #[OA\Property(property: 'insure', description: '', type: 'string')]
    private string $insure;

    #[OA\Property(property: 'supportCod', description: '', type: 'integer')]
    private int $supportCod;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'shippingPrint', description: '', type: 'string')]
    private string $shippingPrint;

    #[OA\Property(property: 'printBg', description: '', type: 'string')]
    private string $printBg;

    #[OA\Property(property: 'configLable', description: '', type: 'string')]
    private string $configLable;

    #[OA\Property(property: 'printModel', description: '', type: 'integer')]
    private int $printModel;

    #[OA\Property(property: 'shippingOrder', description: '', type: 'integer')]
    private int $shippingOrder;

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

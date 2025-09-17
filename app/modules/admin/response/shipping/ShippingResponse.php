<?php

declare(strict_types=1);

namespace app\modules\admin\response\shipping;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingResponse')]
class ShippingResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配送方式ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shippingCode', description: '配送方式代码', type: 'string')]
    private string $shippingCode;

    #[OA\Property(property: 'shippingName', description: '配送方式名称', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'shippingDesc', description: '配送方式描述', type: 'string')]
    private string $shippingDesc;

    #[OA\Property(property: 'insure', description: '保价费用(百分比或固定金额)', type: 'string')]
    private string $insure;

    #[OA\Property(property: 'supportCod', description: '是否支持货到付款(0否 1是)', type: 'integer')]
    private int $supportCod;

    #[OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'shippingPrint', description: '打印模板内容', type: 'string')]
    private string $shippingPrint;

    #[OA\Property(property: 'printBg', description: '打印背景图片路径', type: 'string')]
    private string $printBg;

    #[OA\Property(property: 'configLable', description: '配置标签', type: 'string')]
    private string $configLable;

    #[OA\Property(property: 'printModel', description: '打印模式(0普通 1热敏)', type: 'integer')]
    private int $printModel;

    #[OA\Property(property: 'shippingOrder', description: '排序权重', type: 'integer')]
    private int $shippingOrder;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getShippingCode(): string
    {
        return $this->shippingCode;
    }

    public function setShippingCode(string $shippingCode): void
    {
        $this->shippingCode = $shippingCode;
    }

    public function getShippingName(): string
    {
        return $this->shippingName;
    }

    public function setShippingName(string $shippingName): void
    {
        $this->shippingName = $shippingName;
    }

    public function getShippingDesc(): string
    {
        return $this->shippingDesc;
    }

    public function setShippingDesc(string $shippingDesc): void
    {
        $this->shippingDesc = $shippingDesc;
    }

    public function getInsure(): string
    {
        return $this->insure;
    }

    public function setInsure(string $insure): void
    {
        $this->insure = $insure;
    }

    public function getSupportCod(): int
    {
        return $this->supportCod;
    }

    public function setSupportCod(int $supportCod): void
    {
        $this->supportCod = $supportCod;
    }

    public function getEnabled(): int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getShippingPrint(): string
    {
        return $this->shippingPrint;
    }

    public function setShippingPrint(string $shippingPrint): void
    {
        $this->shippingPrint = $shippingPrint;
    }

    public function getPrintBg(): string
    {
        return $this->printBg;
    }

    public function setPrintBg(string $printBg): void
    {
        $this->printBg = $printBg;
    }

    public function getConfigLable(): string
    {
        return $this->configLable;
    }

    public function setConfigLable(string $configLable): void
    {
        $this->configLable = $configLable;
    }

    public function getPrintModel(): int
    {
        return $this->printModel;
    }

    public function setPrintModel(int $printModel): void
    {
        $this->printModel = $printModel;
    }

    public function getShippingOrder(): int
    {
        return $this->shippingOrder;
    }

    public function setShippingOrder(int $shippingOrder): void
    {
        $this->shippingOrder = $shippingOrder;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}

<?php

declare(strict_types=1);

namespace app\bundles\shipping\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingEntity')]
class ShippingEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配送方式ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shipping_code', description: '配送方式代码', type: 'string')]
    private string $shipping_code;

    #[OA\Property(property: 'shipping_name', description: '配送方式名称', type: 'string')]
    private string $shipping_name;

    #[OA\Property(property: 'shipping_desc', description: '配送方式描述', type: 'string')]
    private string $shipping_desc;

    #[OA\Property(property: 'insure', description: '保价费用(百分比或固定金额)', type: 'string')]
    private string $insure;

    #[OA\Property(property: 'support_cod', description: '是否支持货到付款(0否 1是)', type: 'integer')]
    private int $support_cod;

    #[OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'shipping_print', description: '打印模板内容', type: 'string')]
    private string $shipping_print;

    #[OA\Property(property: 'print_bg', description: '打印背景图片路径', type: 'string')]
    private string $print_bg;

    #[OA\Property(property: 'config_lable', description: '配置标签', type: 'string')]
    private string $config_lable;

    #[OA\Property(property: 'print_model', description: '打印模式(0普通 1热敏)', type: 'integer')]
    private int $print_model;

    #[OA\Property(property: 'shipping_order', description: '排序权重', type: 'integer')]
    private int $shipping_order;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->shipping_code;
    }

    public function setShippingCode(string $shippingCode): void
    {
        $this->shipping_code = $shippingCode;
    }

    public function getShippingName(): string
    {
        return $this->shipping_name;
    }

    public function setShippingName(string $shippingName): void
    {
        $this->shipping_name = $shippingName;
    }

    public function getShippingDesc(): string
    {
        return $this->shipping_desc;
    }

    public function setShippingDesc(string $shippingDesc): void
    {
        $this->shipping_desc = $shippingDesc;
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
        return $this->support_cod;
    }

    public function setSupportCod(int $supportCod): void
    {
        $this->support_cod = $supportCod;
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
        return $this->shipping_print;
    }

    public function setShippingPrint(string $shippingPrint): void
    {
        $this->shipping_print = $shippingPrint;
    }

    public function getPrintBg(): string
    {
        return $this->print_bg;
    }

    public function setPrintBg(string $printBg): void
    {
        $this->print_bg = $printBg;
    }

    public function getConfigLable(): string
    {
        return $this->config_lable;
    }

    public function setConfigLable(string $configLable): void
    {
        $this->config_lable = $configLable;
    }

    public function getPrintModel(): int
    {
        return $this->print_model;
    }

    public function setPrintModel(int $printModel): void
    {
        $this->print_model = $printModel;
    }

    public function getShippingOrder(): int
    {
        return $this->shipping_order;
    }

    public function setShippingOrder(int $shippingOrder): void
    {
        $this->shipping_order = $shippingOrder;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}

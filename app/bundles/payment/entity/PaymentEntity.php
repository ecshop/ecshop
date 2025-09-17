<?php

declare(strict_types=1);

namespace app\bundles\payment\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PaymentEntity')]
class PaymentEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '支付方式ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'pay_code', description: '支付代码', type: 'string')]
    private string $pay_code;

    #[OA\Property(property: 'pay_name', description: '支付名称', type: 'string')]
    private string $pay_name;

    #[OA\Property(property: 'pay_fee', description: '支付手续费', type: 'string')]
    private string $pay_fee;

    #[OA\Property(property: 'pay_desc', description: '支付描述', type: 'string')]
    private string $pay_desc;

    #[OA\Property(property: 'pay_order', description: '排序权重', type: 'integer')]
    private int $pay_order;

    #[OA\Property(property: 'pay_config', description: '支付配置', type: 'string')]
    private string $pay_config;

    #[OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'is_cod', description: '是否货到付款(0否 1是)', type: 'integer')]
    private int $is_cod;

    #[OA\Property(property: 'is_online', description: '是否在线支付(0否 1是)', type: 'integer')]
    private int $is_online;

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

    public function getPayCode(): string
    {
        return $this->pay_code;
    }

    public function setPayCode(string $payCode): void
    {
        $this->pay_code = $payCode;
    }

    public function getPayName(): string
    {
        return $this->pay_name;
    }

    public function setPayName(string $payName): void
    {
        $this->pay_name = $payName;
    }

    public function getPayFee(): string
    {
        return $this->pay_fee;
    }

    public function setPayFee(string $payFee): void
    {
        $this->pay_fee = $payFee;
    }

    public function getPayDesc(): string
    {
        return $this->pay_desc;
    }

    public function setPayDesc(string $payDesc): void
    {
        $this->pay_desc = $payDesc;
    }

    public function getPayOrder(): int
    {
        return $this->pay_order;
    }

    public function setPayOrder(int $payOrder): void
    {
        $this->pay_order = $payOrder;
    }

    public function getPayConfig(): string
    {
        return $this->pay_config;
    }

    public function setPayConfig(string $payConfig): void
    {
        $this->pay_config = $payConfig;
    }

    public function getEnabled(): int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getIsCod(): int
    {
        return $this->is_cod;
    }

    public function setIsCod(int $isCod): void
    {
        $this->is_cod = $isCod;
    }

    public function getIsOnline(): int
    {
        return $this->is_online;
    }

    public function setIsOnline(int $isOnline): void
    {
        $this->is_online = $isOnline;
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

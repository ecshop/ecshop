<?php

declare(strict_types=1);

namespace app\modules\admin\response\payment;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PaymentResponse')]
class PaymentResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '支付方式ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'payCode', description: '支付代码', type: 'string')]
    private string $payCode;

    #[OA\Property(property: 'payName', description: '支付名称', type: 'string')]
    private string $payName;

    #[OA\Property(property: 'payFee', description: '支付手续费', type: 'string')]
    private string $payFee;

    #[OA\Property(property: 'payDesc', description: '支付描述', type: 'string')]
    private string $payDesc;

    #[OA\Property(property: 'payOrder', description: '排序权重', type: 'integer')]
    private int $payOrder;

    #[OA\Property(property: 'payConfig', description: '支付配置', type: 'string')]
    private string $payConfig;

    #[OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'isCod', description: '是否货到付款(0否 1是)', type: 'integer')]
    private int $isCod;

    #[OA\Property(property: 'isOnline', description: '是否在线支付(0否 1是)', type: 'integer')]
    private int $isOnline;

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

    public function getPayCode(): string
    {
        return $this->payCode;
    }

    public function setPayCode(string $payCode): void
    {
        $this->payCode = $payCode;
    }

    public function getPayName(): string
    {
        return $this->payName;
    }

    public function setPayName(string $payName): void
    {
        $this->payName = $payName;
    }

    public function getPayFee(): string
    {
        return $this->payFee;
    }

    public function setPayFee(string $payFee): void
    {
        $this->payFee = $payFee;
    }

    public function getPayDesc(): string
    {
        return $this->payDesc;
    }

    public function setPayDesc(string $payDesc): void
    {
        $this->payDesc = $payDesc;
    }

    public function getPayOrder(): int
    {
        return $this->payOrder;
    }

    public function setPayOrder(int $payOrder): void
    {
        $this->payOrder = $payOrder;
    }

    public function getPayConfig(): string
    {
        return $this->payConfig;
    }

    public function setPayConfig(string $payConfig): void
    {
        $this->payConfig = $payConfig;
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
        return $this->isCod;
    }

    public function setIsCod(int $isCod): void
    {
        $this->isCod = $isCod;
    }

    public function getIsOnline(): int
    {
        return $this->isOnline;
    }

    public function setIsOnline(int $isOnline): void
    {
        $this->isOnline = $isOnline;
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

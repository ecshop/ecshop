<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PaymentEntity')]
class PaymentEntity
{
    use ArrayObject;

    #[OA\Property(property: 'pay_id', description: '', type: 'integer')]
    protected int $payId;

    #[OA\Property(property: 'pay_code', description: '', type: 'string')]
    protected string $payCode;

    #[OA\Property(property: 'pay_name', description: '', type: 'string')]
    protected string $payName;

    #[OA\Property(property: 'pay_fee', description: '', type: 'string')]
    protected string $payFee;

    #[OA\Property(property: 'pay_desc', description: '', type: 'string')]
    protected string $payDesc;

    #[OA\Property(property: 'pay_order', description: '', type: 'integer')]
    protected int $payOrder;

    #[OA\Property(property: 'pay_config', description: '', type: 'string')]
    protected string $payConfig;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    protected int $enabled;

    #[OA\Property(property: 'is_cod', description: '', type: 'integer')]
    protected int $isCod;

    #[OA\Property(property: 'is_online', description: '', type: 'integer')]
    protected int $isOnline;

    /**
     * 获取
     */
    public function getPayId(): int
    {
        return $this->payId;
    }

    /**
     * 设置
     */
    public function setPayId(int $payId): void
    {
        $this->payId = $payId;
    }

    /**
     * 获取
     */
    public function getPayCode(): string
    {
        return $this->payCode;
    }

    /**
     * 设置
     */
    public function setPayCode(string $payCode): void
    {
        $this->payCode = $payCode;
    }

    /**
     * 获取
     */
    public function getPayName(): string
    {
        return $this->payName;
    }

    /**
     * 设置
     */
    public function setPayName(string $payName): void
    {
        $this->payName = $payName;
    }

    /**
     * 获取
     */
    public function getPayFee(): string
    {
        return $this->payFee;
    }

    /**
     * 设置
     */
    public function setPayFee(string $payFee): void
    {
        $this->payFee = $payFee;
    }

    /**
     * 获取
     */
    public function getPayDesc(): string
    {
        return $this->payDesc;
    }

    /**
     * 设置
     */
    public function setPayDesc(string $payDesc): void
    {
        $this->payDesc = $payDesc;
    }

    /**
     * 获取
     */
    public function getPayOrder(): int
    {
        return $this->payOrder;
    }

    /**
     * 设置
     */
    public function setPayOrder(int $payOrder): void
    {
        $this->payOrder = $payOrder;
    }

    /**
     * 获取
     */
    public function getPayConfig(): string
    {
        return $this->payConfig;
    }

    /**
     * 设置
     */
    public function setPayConfig(string $payConfig): void
    {
        $this->payConfig = $payConfig;
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
    public function getIsCod(): int
    {
        return $this->isCod;
    }

    /**
     * 设置
     */
    public function setIsCod(int $isCod): void
    {
        $this->isCod = $isCod;
    }

    /**
     * 获取
     */
    public function getIsOnline(): int
    {
        return $this->isOnline;
    }

    /**
     * 设置
     */
    public function setIsOnline(int $isOnline): void
    {
        $this->isOnline = $isOnline;
    }
}

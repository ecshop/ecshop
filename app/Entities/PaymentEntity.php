<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PaymentEntity')]
class PaymentEntity
{
    use DTOHelper;

    const string getPayId = 'pay_id';

    const string getPayCode = 'pay_code';

    const string getPayName = 'pay_name';

    const string getPayFee = 'pay_fee';

    const string getPayDesc = 'pay_desc';

    const string getPayOrder = 'pay_order';

    const string getPayConfig = 'pay_config';

    const string getEnabled = 'enabled';

    const string getIsCod = 'is_cod';

    const string getIsOnline = 'is_online';

    #[OA\Property(property: 'payId', description: '', type: 'integer')]
    private int $payId;

    #[OA\Property(property: 'payCode', description: '', type: 'string')]
    private string $payCode;

    #[OA\Property(property: 'payName', description: '', type: 'string')]
    private string $payName;

    #[OA\Property(property: 'payFee', description: '', type: 'string')]
    private string $payFee;

    #[OA\Property(property: 'payDesc', description: '', type: 'string')]
    private string $payDesc;

    #[OA\Property(property: 'payOrder', description: '', type: 'integer')]
    private int $payOrder;

    #[OA\Property(property: 'payConfig', description: '', type: 'string')]
    private string $payConfig;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'isCod', description: '', type: 'integer')]
    private int $isCod;

    #[OA\Property(property: 'isOnline', description: '', type: 'integer')]
    private int $isOnline;

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

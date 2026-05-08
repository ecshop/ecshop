<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\DeliveryOrder;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'DeliveryOrderResponse')]
class DeliveryOrderResponse
{
    use DTOHelper;

    #[OA\Property(property: 'deliveryId', description: '', type: 'integer')]
    private int $deliveryId;

    #[OA\Property(property: 'deliverySn', description: '', type: 'string')]
    private string $deliverySn;

    #[OA\Property(property: 'orderSn', description: '', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'invoiceNo', description: '', type: 'string')]
    private string $invoiceNo;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'shippingId', description: '', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'shippingName', description: '', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'actionUser', description: '', type: 'string')]
    private string $actionUser;

    #[OA\Property(property: 'consignee', description: '', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'address', description: '', type: 'string')]
    private string $address;

    #[OA\Property(property: 'country', description: '', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'signBuilding', description: '', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'zipcode', description: '', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'bestTime', description: '', type: 'string')]
    private string $bestTime;

    #[OA\Property(property: 'postscript', description: '', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'howOos', description: '', type: 'string')]
    private string $howOos;

    #[OA\Property(property: 'insureFee', description: '', type: 'string')]
    private string $insureFee;

    #[OA\Property(property: 'shippingFee', description: '', type: 'string')]
    private string $shippingFee;

    #[OA\Property(property: 'updateTime', description: '', type: 'integer')]
    private int $updateTime;

    #[OA\Property(property: 'suppliersId', description: '', type: 'integer')]
    private int $suppliersId;

    #[OA\Property(property: 'status', description: '', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'agencyId', description: '', type: 'integer')]
    private int $agencyId;

    /**
     * 获取
     */
    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    /**
     * 设置
     */
    public function setDeliveryId(int $deliveryId): void
    {
        $this->deliveryId = $deliveryId;
    }

    /**
     * 获取
     */
    public function getDeliverySn(): string
    {
        return $this->deliverySn;
    }

    /**
     * 设置
     */
    public function setDeliverySn(string $deliverySn): void
    {
        $this->deliverySn = $deliverySn;
    }

    /**
     * 获取
     */
    public function getOrderSn(): string
    {
        return $this->orderSn;
    }

    /**
     * 设置
     */
    public function setOrderSn(string $orderSn): void
    {
        $this->orderSn = $orderSn;
    }

    /**
     * 获取
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * 设置
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * 获取
     */
    public function getInvoiceNo(): string
    {
        return $this->invoiceNo;
    }

    /**
     * 设置
     */
    public function setInvoiceNo(string $invoiceNo): void
    {
        $this->invoiceNo = $invoiceNo;
    }

    /**
     * 获取
     */
    public function getAddTime(): int
    {
        return $this->addTime;
    }

    /**
     * 设置
     */
    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getActionUser(): string
    {
        return $this->actionUser;
    }

    /**
     * 设置
     */
    public function setActionUser(string $actionUser): void
    {
        $this->actionUser = $actionUser;
    }

    /**
     * 获取
     */
    public function getConsignee(): string
    {
        return $this->consignee;
    }

    /**
     * 设置
     */
    public function setConsignee(string $consignee): void
    {
        $this->consignee = $consignee;
    }

    /**
     * 获取
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * 设置
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * 获取
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * 设置
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    /**
     * 获取
     */
    public function getProvince(): int
    {
        return $this->province;
    }

    /**
     * 设置
     */
    public function setProvince(int $province): void
    {
        $this->province = $province;
    }

    /**
     * 获取
     */
    public function getCity(): int
    {
        return $this->city;
    }

    /**
     * 设置
     */
    public function setCity(int $city): void
    {
        $this->city = $city;
    }

    /**
     * 获取
     */
    public function getDistrict(): int
    {
        return $this->district;
    }

    /**
     * 设置
     */
    public function setDistrict(int $district): void
    {
        $this->district = $district;
    }

    /**
     * 获取
     */
    public function getSignBuilding(): string
    {
        return $this->signBuilding;
    }

    /**
     * 设置
     */
    public function setSignBuilding(string $signBuilding): void
    {
        $this->signBuilding = $signBuilding;
    }

    /**
     * 获取
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * 设置
     */
    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * 获取
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * 设置
     */
    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * 获取
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * 设置
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * 获取
     */
    public function getBestTime(): string
    {
        return $this->bestTime;
    }

    /**
     * 设置
     */
    public function setBestTime(string $bestTime): void
    {
        $this->bestTime = $bestTime;
    }

    /**
     * 获取
     */
    public function getPostscript(): string
    {
        return $this->postscript;
    }

    /**
     * 设置
     */
    public function setPostscript(string $postscript): void
    {
        $this->postscript = $postscript;
    }

    /**
     * 获取
     */
    public function getHowOos(): string
    {
        return $this->howOos;
    }

    /**
     * 设置
     */
    public function setHowOos(string $howOos): void
    {
        $this->howOos = $howOos;
    }

    /**
     * 获取
     */
    public function getInsureFee(): string
    {
        return $this->insureFee;
    }

    /**
     * 设置
     */
    public function setInsureFee(string $insureFee): void
    {
        $this->insureFee = $insureFee;
    }

    /**
     * 获取
     */
    public function getShippingFee(): string
    {
        return $this->shippingFee;
    }

    /**
     * 设置
     */
    public function setShippingFee(string $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    /**
     * 获取
     */
    public function getUpdateTime(): int
    {
        return $this->updateTime;
    }

    /**
     * 设置
     */
    public function setUpdateTime(int $updateTime): void
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取
     */
    public function getSuppliersId(): int
    {
        return $this->suppliersId;
    }

    /**
     * 设置
     */
    public function setSuppliersId(int $suppliersId): void
    {
        $this->suppliersId = $suppliersId;
    }

    /**
     * 获取
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * 设置
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * 获取
     */
    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    /**
     * 设置
     */
    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
    }
}

<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderBackOrder;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderBackOrderResponse')]
class OrderBackOrderResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '退货单ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'deliverySn', description: '物流单号', type: 'string')]
    private string $deliverySn;

    #[OA\Property(property: 'orderSn', description: '订单号', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'orderId', description: '订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'invoiceNo', description: '发票号', type: 'string')]
    private string $invoiceNo;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'shippingId', description: '配送方式ID', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'shippingName', description: '配送方式名称', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'actionUser', description: '操作人', type: 'string')]
    private string $actionUser;

    #[OA\Property(property: 'consignee', description: '收货人', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'address', description: '收货地址', type: 'string')]
    private string $address;

    #[OA\Property(property: 'country', description: '国家ID', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '省份ID', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '城市ID', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '区县ID', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'signBuilding', description: '标志性建筑', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'email', description: '邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'zipcode', description: '邮编', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '手机', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'bestTime', description: '最佳送货时间', type: 'string')]
    private string $bestTime;

    #[OA\Property(property: 'postscript', description: '订单附言', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'howOos', description: '缺货处理方式', type: 'string')]
    private string $howOos;

    #[OA\Property(property: 'insureFee', description: '保价费用', type: 'float')]
    private float $insureFee;

    #[OA\Property(property: 'shippingFee', description: '配送费用', type: 'float')]
    private float $shippingFee;

    #[OA\Property(property: 'updateTime', description: '更新时间', type: 'integer')]
    private int $updateTime;

    #[OA\Property(property: 'supplierId', description: '供应商ID', type: 'integer')]
    private int $supplierId;

    #[OA\Property(property: 'status', description: '退货状态', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'returnTime', description: '退货时间', type: 'integer')]
    private int $returnTime;

    #[OA\Property(property: 'agencyId', description: '办事处ID', type: 'integer')]
    private int $agencyId;

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

    public function getDeliverySn(): string
    {
        return $this->deliverySn;
    }

    public function setDeliverySn(string $deliverySn): void
    {
        $this->deliverySn = $deliverySn;
    }

    public function getOrderSn(): string
    {
        return $this->orderSn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->orderSn = $orderSn;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getInvoiceNo(): string
    {
        return $this->invoiceNo;
    }

    public function setInvoiceNo(string $invoiceNo): void
    {
        $this->invoiceNo = $invoiceNo;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getShippingId(): int
    {
        return $this->shippingId;
    }

    public function setShippingId(int $shippingId): void
    {
        $this->shippingId = $shippingId;
    }

    public function getShippingName(): string
    {
        return $this->shippingName;
    }

    public function setShippingName(string $shippingName): void
    {
        $this->shippingName = $shippingName;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getActionUser(): string
    {
        return $this->actionUser;
    }

    public function setActionUser(string $actionUser): void
    {
        $this->actionUser = $actionUser;
    }

    public function getConsignee(): string
    {
        return $this->consignee;
    }

    public function setConsignee(string $consignee): void
    {
        $this->consignee = $consignee;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCountry(): int
    {
        return $this->country;
    }

    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    public function getProvince(): int
    {
        return $this->province;
    }

    public function setProvince(int $province): void
    {
        $this->province = $province;
    }

    public function getCity(): int
    {
        return $this->city;
    }

    public function setCity(int $city): void
    {
        $this->city = $city;
    }

    public function getDistrict(): int
    {
        return $this->district;
    }

    public function setDistrict(int $district): void
    {
        $this->district = $district;
    }

    public function getSignBuilding(): string
    {
        return $this->signBuilding;
    }

    public function setSignBuilding(string $signBuilding): void
    {
        $this->signBuilding = $signBuilding;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    public function getBestTime(): string
    {
        return $this->bestTime;
    }

    public function setBestTime(string $bestTime): void
    {
        $this->bestTime = $bestTime;
    }

    public function getPostscript(): string
    {
        return $this->postscript;
    }

    public function setPostscript(string $postscript): void
    {
        $this->postscript = $postscript;
    }

    public function getHowOos(): string
    {
        return $this->howOos;
    }

    public function setHowOos(string $howOos): void
    {
        $this->howOos = $howOos;
    }

    public function getInsureFee(): float
    {
        return $this->insureFee;
    }

    public function setInsureFee(float $insureFee): void
    {
        $this->insureFee = $insureFee;
    }

    public function getShippingFee(): float
    {
        return $this->shippingFee;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    public function getUpdateTime(): int
    {
        return $this->updateTime;
    }

    public function setUpdateTime(int $updateTime): void
    {
        $this->updateTime = $updateTime;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getReturnTime(): int
    {
        return $this->returnTime;
    }

    public function setReturnTime(int $returnTime): void
    {
        $this->returnTime = $returnTime;
    }

    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
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

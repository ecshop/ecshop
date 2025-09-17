<?php

declare(strict_types=1);

namespace app\bundles\order\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderBackOrderEntity')]
class OrderBackOrderEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '退货单ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'delivery_sn', description: '物流单号', type: 'string')]
    private string $delivery_sn;

    #[OA\Property(property: 'order_sn', description: '订单号', type: 'string')]
    private string $order_sn;

    #[OA\Property(property: 'order_id', description: '订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'invoice_no', description: '发票号', type: 'string')]
    private string $invoice_no;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'shipping_id', description: '配送方式ID', type: 'integer')]
    private int $shipping_id;

    #[OA\Property(property: 'shipping_name', description: '配送方式名称', type: 'string')]
    private string $shipping_name;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'action_user', description: '操作人', type: 'string')]
    private string $action_user;

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

    #[OA\Property(property: 'sign_building', description: '标志性建筑', type: 'string')]
    private string $sign_building;

    #[OA\Property(property: 'email', description: '邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'zipcode', description: '邮编', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '手机', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'best_time', description: '最佳送货时间', type: 'string')]
    private string $best_time;

    #[OA\Property(property: 'postscript', description: '订单附言', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'how_oos', description: '缺货处理方式', type: 'string')]
    private string $how_oos;

    #[OA\Property(property: 'insure_fee', description: '保价费用', type: 'float')]
    private float $insure_fee;

    #[OA\Property(property: 'shipping_fee', description: '配送费用', type: 'float')]
    private float $shipping_fee;

    #[OA\Property(property: 'update_time', description: '更新时间', type: 'integer')]
    private int $update_time;

    #[OA\Property(property: 'supplier_id', description: '供应商ID', type: 'integer')]
    private int $supplier_id;

    #[OA\Property(property: 'status', description: '退货状态', type: 'integer')]
    private int $status;

    #[OA\Property(property: 'return_time', description: '退货时间', type: 'integer')]
    private int $return_time;

    #[OA\Property(property: 'agency_id', description: '办事处ID', type: 'integer')]
    private int $agency_id;

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

    public function getDeliverySn(): string
    {
        return $this->delivery_sn;
    }

    public function setDeliverySn(string $deliverySn): void
    {
        $this->delivery_sn = $deliverySn;
    }

    public function getOrderSn(): string
    {
        return $this->order_sn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->order_sn = $orderSn;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function setOrderId(int $orderId): void
    {
        $this->order_id = $orderId;
    }

    public function getInvoiceNo(): string
    {
        return $this->invoice_no;
    }

    public function setInvoiceNo(string $invoiceNo): void
    {
        $this->invoice_no = $invoiceNo;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getShippingId(): int
    {
        return $this->shipping_id;
    }

    public function setShippingId(int $shippingId): void
    {
        $this->shipping_id = $shippingId;
    }

    public function getShippingName(): string
    {
        return $this->shipping_name;
    }

    public function setShippingName(string $shippingName): void
    {
        $this->shipping_name = $shippingName;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getActionUser(): string
    {
        return $this->action_user;
    }

    public function setActionUser(string $actionUser): void
    {
        $this->action_user = $actionUser;
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
        return $this->sign_building;
    }

    public function setSignBuilding(string $signBuilding): void
    {
        $this->sign_building = $signBuilding;
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
        return $this->best_time;
    }

    public function setBestTime(string $bestTime): void
    {
        $this->best_time = $bestTime;
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
        return $this->how_oos;
    }

    public function setHowOos(string $howOos): void
    {
        $this->how_oos = $howOos;
    }

    public function getInsureFee(): float
    {
        return $this->insure_fee;
    }

    public function setInsureFee(float $insureFee): void
    {
        $this->insure_fee = $insureFee;
    }

    public function getShippingFee(): float
    {
        return $this->shipping_fee;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shipping_fee = $shippingFee;
    }

    public function getUpdateTime(): int
    {
        return $this->update_time;
    }

    public function setUpdateTime(int $updateTime): void
    {
        $this->update_time = $updateTime;
    }

    public function getSupplierId(): int
    {
        return $this->supplier_id;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplier_id = $supplierId;
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
        return $this->return_time;
    }

    public function setReturnTime(int $returnTime): void
    {
        $this->return_time = $returnTime;
    }

    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agency_id = $agencyId;
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

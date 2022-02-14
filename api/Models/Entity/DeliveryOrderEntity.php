<?php

namespace App\Models\Entity;

/**
 * Class DeliveryOrderEntity
 * @package App\Models\Entity
 */
class DeliveryOrderEntity
{
    /**
     * @var int 
     */
    private int $delivery_id;

    /**
     * @var string 
     */
    private string $delivery_sn;

    /**
     * @var string 
     */
    private string $order_sn;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var string 
     */
    private string $invoice_no;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var int 
     */
    private int $shipping_id;

    /**
     * @var string 
     */
    private string $shipping_name;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $action_user;

    /**
     * @var string 
     */
    private string $consignee;

    /**
     * @var string 
     */
    private string $address;

    /**
     * @var int 
     */
    private int $country;

    /**
     * @var int 
     */
    private int $province;

    /**
     * @var int 
     */
    private int $city;

    /**
     * @var int 
     */
    private int $district;

    /**
     * @var string 
     */
    private string $sign_building;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var string 
     */
    private string $zipcode;

    /**
     * @var string 
     */
    private string $tel;

    /**
     * @var string 
     */
    private string $mobile;

    /**
     * @var string 
     */
    private string $best_time;

    /**
     * @var string 
     */
    private string $postscript;

    /**
     * @var string 
     */
    private string $how_oos;

    /**
     * @var float 
     */
    private float $insure_fee;

    /**
     * @var float 
     */
    private float $shipping_fee;

    /**
     * @var int 
     */
    private int $update_time;

    /**
     * @var int 
     */
    private int $suppliers_id;

    /**
     * @var int 
     */
    private int $status;

    /**
     * @var int 
     */
    private int $agency_id;

    /**
     * @return int
     */
    public function getDeliveryId(): int
    {
        return $this->delivery_id;
    }

    /**
     * @param int $value
     */
    public function setDeliveryId(int $value)
    {
        $this->delivery_id = $value;
    }

    /**
     * @return string
     */
    public function getDeliverySn(): string
    {
        return $this->delivery_sn;
    }

    /**
     * @param string $value
     */
    public function setDeliverySn(string $value)
    {
        $this->delivery_sn = $value;
    }

    /**
     * @return string
     */
    public function getOrderSn(): string
    {
        return $this->order_sn;
    }

    /**
     * @param string $value
     */
    public function setOrderSn(string $value)
    {
        $this->order_sn = $value;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $value
     */
    public function setOrderId(int $value)
    {
        $this->order_id = $value;
    }

    /**
     * @return string
     */
    public function getInvoiceNo(): string
    {
        return $this->invoice_no;
    }

    /**
     * @param string $value
     */
    public function setInvoiceNo(string $value)
    {
        $this->invoice_no = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return int
     */
    public function getShippingId(): int
    {
        return $this->shipping_id;
    }

    /**
     * @param int $value
     */
    public function setShippingId(int $value)
    {
        $this->shipping_id = $value;
    }

    /**
     * @return string
     */
    public function getShippingName(): string
    {
        return $this->shipping_name;
    }

    /**
     * @param string $value
     */
    public function setShippingName(string $value)
    {
        $this->shipping_name = $value;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return string
     */
    public function getActionUser(): string
    {
        return $this->action_user;
    }

    /**
     * @param string $value
     */
    public function setActionUser(string $value)
    {
        $this->action_user = $value;
    }

    /**
     * @return string
     */
    public function getConsignee(): string
    {
        return $this->consignee;
    }

    /**
     * @param string $value
     */
    public function setConsignee(string $value)
    {
        $this->consignee = $value;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $value
     */
    public function setAddress(string $value)
    {
        $this->address = $value;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $value
     */
    public function setCountry(int $value)
    {
        $this->country = $value;
    }

    /**
     * @return int
     */
    public function getProvince(): int
    {
        return $this->province;
    }

    /**
     * @param int $value
     */
    public function setProvince(int $value)
    {
        $this->province = $value;
    }

    /**
     * @return int
     */
    public function getCity(): int
    {
        return $this->city;
    }

    /**
     * @param int $value
     */
    public function setCity(int $value)
    {
        $this->city = $value;
    }

    /**
     * @return int
     */
    public function getDistrict(): int
    {
        return $this->district;
    }

    /**
     * @param int $value
     */
    public function setDistrict(int $value)
    {
        $this->district = $value;
    }

    /**
     * @return string
     */
    public function getSignBuilding(): string
    {
        return $this->sign_building;
    }

    /**
     * @param string $value
     */
    public function setSignBuilding(string $value)
    {
        $this->sign_building = $value;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value)
    {
        $this->email = $value;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $value
     */
    public function setZipcode(string $value)
    {
        $this->zipcode = $value;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @param string $value
     */
    public function setTel(string $value)
    {
        $this->tel = $value;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $value
     */
    public function setMobile(string $value)
    {
        $this->mobile = $value;
    }

    /**
     * @return string
     */
    public function getBestTime(): string
    {
        return $this->best_time;
    }

    /**
     * @param string $value
     */
    public function setBestTime(string $value)
    {
        $this->best_time = $value;
    }

    /**
     * @return string
     */
    public function getPostscript(): string
    {
        return $this->postscript;
    }

    /**
     * @param string $value
     */
    public function setPostscript(string $value)
    {
        $this->postscript = $value;
    }

    /**
     * @return string
     */
    public function getHowOos(): string
    {
        return $this->how_oos;
    }

    /**
     * @param string $value
     */
    public function setHowOos(string $value)
    {
        $this->how_oos = $value;
    }

    /**
     * @return float
     */
    public function getInsureFee(): float
    {
        return $this->insure_fee;
    }

    /**
     * @param float $value
     */
    public function setInsureFee(float $value)
    {
        $this->insure_fee = $value;
    }

    /**
     * @return float
     */
    public function getShippingFee(): float
    {
        return $this->shipping_fee;
    }

    /**
     * @param float $value
     */
    public function setShippingFee(float $value)
    {
        $this->shipping_fee = $value;
    }

    /**
     * @return int
     */
    public function getUpdateTime(): int
    {
        return $this->update_time;
    }

    /**
     * @param int $value
     */
    public function setUpdateTime(int $value)
    {
        $this->update_time = $value;
    }

    /**
     * @return int
     */
    public function getSuppliersId(): int
    {
        return $this->suppliers_id;
    }

    /**
     * @param int $value
     */
    public function setSuppliersId(int $value)
    {
        $this->suppliers_id = $value;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $value
     */
    public function setStatus(int $value)
    {
        $this->status = $value;
    }

    /**
     * @return int
     */
    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    /**
     * @param int $value
     */
    public function setAgencyId(int $value)
    {
        $this->agency_id = $value;
    }

}

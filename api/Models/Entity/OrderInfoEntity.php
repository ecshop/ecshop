<?php

namespace App\Models\Entity;

/**
 * Class OrderInfoEntity
 * @package App\Models\Entity
 */
class OrderInfoEntity
{
    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var string 
     */
    private string $order_sn;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var int 
     */
    private int $order_status;

    /**
     * @var int 
     */
    private int $shipping_status;

    /**
     * @var int 
     */
    private int $pay_status;

    /**
     * @var string 
     */
    private string $consignee;

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
    private string $address;

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
    private string $email;

    /**
     * @var string 
     */
    private string $best_time;

    /**
     * @var string 
     */
    private string $sign_building;

    /**
     * @var string 
     */
    private string $postscript;

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
    private int $pay_id;

    /**
     * @var string 
     */
    private string $pay_name;

    /**
     * @var string 
     */
    private string $how_oos;

    /**
     * @var string 
     */
    private string $how_surplus;

    /**
     * @var string 
     */
    private string $pack_name;

    /**
     * @var string 
     */
    private string $card_name;

    /**
     * @var string 
     */
    private string $card_message;

    /**
     * @var string 
     */
    private string $inv_payee;

    /**
     * @var string 
     */
    private string $inv_content;

    /**
     * @var float 
     */
    private float $goods_amount;

    /**
     * @var float 
     */
    private float $shipping_fee;

    /**
     * @var float 
     */
    private float $insure_fee;

    /**
     * @var float 
     */
    private float $pay_fee;

    /**
     * @var float 
     */
    private float $pack_fee;

    /**
     * @var float 
     */
    private float $card_fee;

    /**
     * @var float 
     */
    private float $money_paid;

    /**
     * @var float 
     */
    private float $surplus;

    /**
     * @var int 
     */
    private int $integral;

    /**
     * @var float 
     */
    private float $integral_money;

    /**
     * @var float 
     */
    private float $bonus;

    /**
     * @var float 
     */
    private float $order_amount;

    /**
     * @var int 
     */
    private int $from_ad;

    /**
     * @var string 
     */
    private string $referer;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var int 
     */
    private int $confirm_time;

    /**
     * @var int 
     */
    private int $pay_time;

    /**
     * @var int 
     */
    private int $shipping_time;

    /**
     * @var int 
     */
    private int $pack_id;

    /**
     * @var int 
     */
    private int $card_id;

    /**
     * @var int 
     */
    private int $bonus_id;

    /**
     * @var string 
     */
    private string $invoice_no;

    /**
     * @var string 
     */
    private string $extension_code;

    /**
     * @var int 
     */
    private int $extension_id;

    /**
     * @var string 
     */
    private string $to_buyer;

    /**
     * @var string 
     */
    private string $pay_note;

    /**
     * @var int 
     */
    private int $agency_id;

    /**
     * @var string 
     */
    private string $inv_type;

    /**
     * @var float 
     */
    private float $tax;

    /**
     * @var int 
     */
    private int $is_separate;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var float 
     */
    private float $discount;

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
     * @return int
     */
    public function getOrderStatus(): int
    {
        return $this->order_status;
    }

    /**
     * @param int $value
     */
    public function setOrderStatus(int $value)
    {
        $this->order_status = $value;
    }

    /**
     * @return int
     */
    public function getShippingStatus(): int
    {
        return $this->shipping_status;
    }

    /**
     * @param int $value
     */
    public function setShippingStatus(int $value)
    {
        $this->shipping_status = $value;
    }

    /**
     * @return int
     */
    public function getPayStatus(): int
    {
        return $this->pay_status;
    }

    /**
     * @param int $value
     */
    public function setPayStatus(int $value)
    {
        $this->pay_status = $value;
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
    public function getPayId(): int
    {
        return $this->pay_id;
    }

    /**
     * @param int $value
     */
    public function setPayId(int $value)
    {
        $this->pay_id = $value;
    }

    /**
     * @return string
     */
    public function getPayName(): string
    {
        return $this->pay_name;
    }

    /**
     * @param string $value
     */
    public function setPayName(string $value)
    {
        $this->pay_name = $value;
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
     * @return string
     */
    public function getHowSurplus(): string
    {
        return $this->how_surplus;
    }

    /**
     * @param string $value
     */
    public function setHowSurplus(string $value)
    {
        $this->how_surplus = $value;
    }

    /**
     * @return string
     */
    public function getPackName(): string
    {
        return $this->pack_name;
    }

    /**
     * @param string $value
     */
    public function setPackName(string $value)
    {
        $this->pack_name = $value;
    }

    /**
     * @return string
     */
    public function getCardName(): string
    {
        return $this->card_name;
    }

    /**
     * @param string $value
     */
    public function setCardName(string $value)
    {
        $this->card_name = $value;
    }

    /**
     * @return string
     */
    public function getCardMessage(): string
    {
        return $this->card_message;
    }

    /**
     * @param string $value
     */
    public function setCardMessage(string $value)
    {
        $this->card_message = $value;
    }

    /**
     * @return string
     */
    public function getInvPayee(): string
    {
        return $this->inv_payee;
    }

    /**
     * @param string $value
     */
    public function setInvPayee(string $value)
    {
        $this->inv_payee = $value;
    }

    /**
     * @return string
     */
    public function getInvContent(): string
    {
        return $this->inv_content;
    }

    /**
     * @param string $value
     */
    public function setInvContent(string $value)
    {
        $this->inv_content = $value;
    }

    /**
     * @return float
     */
    public function getGoodsAmount(): float
    {
        return $this->goods_amount;
    }

    /**
     * @param float $value
     */
    public function setGoodsAmount(float $value)
    {
        $this->goods_amount = $value;
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
    public function getPayFee(): float
    {
        return $this->pay_fee;
    }

    /**
     * @param float $value
     */
    public function setPayFee(float $value)
    {
        $this->pay_fee = $value;
    }

    /**
     * @return float
     */
    public function getPackFee(): float
    {
        return $this->pack_fee;
    }

    /**
     * @param float $value
     */
    public function setPackFee(float $value)
    {
        $this->pack_fee = $value;
    }

    /**
     * @return float
     */
    public function getCardFee(): float
    {
        return $this->card_fee;
    }

    /**
     * @param float $value
     */
    public function setCardFee(float $value)
    {
        $this->card_fee = $value;
    }

    /**
     * @return float
     */
    public function getMoneyPaid(): float
    {
        return $this->money_paid;
    }

    /**
     * @param float $value
     */
    public function setMoneyPaid(float $value)
    {
        $this->money_paid = $value;
    }

    /**
     * @return float
     */
    public function getSurplus(): float
    {
        return $this->surplus;
    }

    /**
     * @param float $value
     */
    public function setSurplus(float $value)
    {
        $this->surplus = $value;
    }

    /**
     * @return int
     */
    public function getIntegral(): int
    {
        return $this->integral;
    }

    /**
     * @param int $value
     */
    public function setIntegral(int $value)
    {
        $this->integral = $value;
    }

    /**
     * @return float
     */
    public function getIntegralMoney(): float
    {
        return $this->integral_money;
    }

    /**
     * @param float $value
     */
    public function setIntegralMoney(float $value)
    {
        $this->integral_money = $value;
    }

    /**
     * @return float
     */
    public function getBonus(): float
    {
        return $this->bonus;
    }

    /**
     * @param float $value
     */
    public function setBonus(float $value)
    {
        $this->bonus = $value;
    }

    /**
     * @return float
     */
    public function getOrderAmount(): float
    {
        return $this->order_amount;
    }

    /**
     * @param float $value
     */
    public function setOrderAmount(float $value)
    {
        $this->order_amount = $value;
    }

    /**
     * @return int
     */
    public function getFromAd(): int
    {
        return $this->from_ad;
    }

    /**
     * @param int $value
     */
    public function setFromAd(int $value)
    {
        $this->from_ad = $value;
    }

    /**
     * @return string
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * @param string $value
     */
    public function setReferer(string $value)
    {
        $this->referer = $value;
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
    public function getConfirmTime(): int
    {
        return $this->confirm_time;
    }

    /**
     * @param int $value
     */
    public function setConfirmTime(int $value)
    {
        $this->confirm_time = $value;
    }

    /**
     * @return int
     */
    public function getPayTime(): int
    {
        return $this->pay_time;
    }

    /**
     * @param int $value
     */
    public function setPayTime(int $value)
    {
        $this->pay_time = $value;
    }

    /**
     * @return int
     */
    public function getShippingTime(): int
    {
        return $this->shipping_time;
    }

    /**
     * @param int $value
     */
    public function setShippingTime(int $value)
    {
        $this->shipping_time = $value;
    }

    /**
     * @return int
     */
    public function getPackId(): int
    {
        return $this->pack_id;
    }

    /**
     * @param int $value
     */
    public function setPackId(int $value)
    {
        $this->pack_id = $value;
    }

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

    /**
     * @param int $value
     */
    public function setCardId(int $value)
    {
        $this->card_id = $value;
    }

    /**
     * @return int
     */
    public function getBonusId(): int
    {
        return $this->bonus_id;
    }

    /**
     * @param int $value
     */
    public function setBonusId(int $value)
    {
        $this->bonus_id = $value;
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
     * @return string
     */
    public function getExtensionCode(): string
    {
        return $this->extension_code;
    }

    /**
     * @param string $value
     */
    public function setExtensionCode(string $value)
    {
        $this->extension_code = $value;
    }

    /**
     * @return int
     */
    public function getExtensionId(): int
    {
        return $this->extension_id;
    }

    /**
     * @param int $value
     */
    public function setExtensionId(int $value)
    {
        $this->extension_id = $value;
    }

    /**
     * @return string
     */
    public function getToBuyer(): string
    {
        return $this->to_buyer;
    }

    /**
     * @param string $value
     */
    public function setToBuyer(string $value)
    {
        $this->to_buyer = $value;
    }

    /**
     * @return string
     */
    public function getPayNote(): string
    {
        return $this->pay_note;
    }

    /**
     * @param string $value
     */
    public function setPayNote(string $value)
    {
        $this->pay_note = $value;
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

    /**
     * @return string
     */
    public function getInvType(): string
    {
        return $this->inv_type;
    }

    /**
     * @param string $value
     */
    public function setInvType(string $value)
    {
        $this->inv_type = $value;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $value
     */
    public function setTax(float $value)
    {
        $this->tax = $value;
    }

    /**
     * @return int
     */
    public function getIsSeparate(): int
    {
        return $this->is_separate;
    }

    /**
     * @param int $value
     */
    public function setIsSeparate(int $value)
    {
        $this->is_separate = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $value
     */
    public function setDiscount(float $value)
    {
        $this->discount = $value;
    }

}

<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderInfoEntity')]
class OrderInfoEntity
{
    use ArrayObject;

    #[OA\Property(property: 'order_id', description: '', type: 'integer')]
    protected int $orderId;

    #[OA\Property(property: 'order_sn', description: '', type: 'string')]
    protected string $orderSn;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'order_status', description: '', type: 'integer')]
    protected int $orderStatus;

    #[OA\Property(property: 'shipping_status', description: '', type: 'integer')]
    protected int $shippingStatus;

    #[OA\Property(property: 'pay_status', description: '', type: 'integer')]
    protected int $payStatus;

    #[OA\Property(property: 'consignee', description: '', type: 'string')]
    protected string $consignee;

    #[OA\Property(property: 'country', description: '', type: 'integer')]
    protected int $country;

    #[OA\Property(property: 'province', description: '', type: 'integer')]
    protected int $province;

    #[OA\Property(property: 'city', description: '', type: 'integer')]
    protected int $city;

    #[OA\Property(property: 'district', description: '', type: 'integer')]
    protected int $district;

    #[OA\Property(property: 'address', description: '', type: 'string')]
    protected string $address;

    #[OA\Property(property: 'zipcode', description: '', type: 'string')]
    protected string $zipcode;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    protected string $tel;

    #[OA\Property(property: 'mobile', description: '', type: 'string')]
    protected string $mobile;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'best_time', description: '', type: 'string')]
    protected string $bestTime;

    #[OA\Property(property: 'sign_building', description: '', type: 'string')]
    protected string $signBuilding;

    #[OA\Property(property: 'postscript', description: '', type: 'string')]
    protected string $postscript;

    #[OA\Property(property: 'shipping_id', description: '', type: 'integer')]
    protected int $shippingId;

    #[OA\Property(property: 'shipping_name', description: '', type: 'string')]
    protected string $shippingName;

    #[OA\Property(property: 'pay_id', description: '', type: 'integer')]
    protected int $payId;

    #[OA\Property(property: 'pay_name', description: '', type: 'string')]
    protected string $payName;

    #[OA\Property(property: 'how_oos', description: '', type: 'string')]
    protected string $howOos;

    #[OA\Property(property: 'how_surplus', description: '', type: 'string')]
    protected string $howSurplus;

    #[OA\Property(property: 'pack_name', description: '', type: 'string')]
    protected string $packName;

    #[OA\Property(property: 'card_name', description: '', type: 'string')]
    protected string $cardName;

    #[OA\Property(property: 'card_message', description: '', type: 'string')]
    protected string $cardMessage;

    #[OA\Property(property: 'inv_payee', description: '', type: 'string')]
    protected string $invPayee;

    #[OA\Property(property: 'inv_content', description: '', type: 'string')]
    protected string $invContent;

    #[OA\Property(property: 'goods_amount', description: '', type: 'float')]
    protected float $goodsAmount;

    #[OA\Property(property: 'shipping_fee', description: '', type: 'float')]
    protected float $shippingFee;

    #[OA\Property(property: 'insure_fee', description: '', type: 'float')]
    protected float $insureFee;

    #[OA\Property(property: 'pay_fee', description: '', type: 'float')]
    protected float $payFee;

    #[OA\Property(property: 'pack_fee', description: '', type: 'float')]
    protected float $packFee;

    #[OA\Property(property: 'card_fee', description: '', type: 'float')]
    protected float $cardFee;

    #[OA\Property(property: 'money_paid', description: '', type: 'float')]
    protected float $moneyPaid;

    #[OA\Property(property: 'surplus', description: '', type: 'float')]
    protected float $surplus;

    #[OA\Property(property: 'integral', description: '', type: 'integer')]
    protected int $integral;

    #[OA\Property(property: 'integral_money', description: '', type: 'float')]
    protected float $integralMoney;

    #[OA\Property(property: 'bonus', description: '', type: 'float')]
    protected float $bonus;

    #[OA\Property(property: 'order_amount', description: '', type: 'float')]
    protected float $orderAmount;

    #[OA\Property(property: 'from_ad', description: '', type: 'integer')]
    protected int $fromAd;

    #[OA\Property(property: 'referer', description: '', type: 'string')]
    protected string $referer;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'confirm_time', description: '', type: 'integer')]
    protected int $confirmTime;

    #[OA\Property(property: 'pay_time', description: '', type: 'integer')]
    protected int $payTime;

    #[OA\Property(property: 'shipping_time', description: '', type: 'integer')]
    protected int $shippingTime;

    #[OA\Property(property: 'pack_id', description: '', type: 'integer')]
    protected int $packId;

    #[OA\Property(property: 'card_id', description: '', type: 'integer')]
    protected int $cardId;

    #[OA\Property(property: 'bonus_id', description: '', type: 'integer')]
    protected int $bonusId;

    #[OA\Property(property: 'invoice_no', description: '', type: 'string')]
    protected string $invoiceNo;

    #[OA\Property(property: 'extension_code', description: '', type: 'string')]
    protected string $extensionCode;

    #[OA\Property(property: 'extension_id', description: '', type: 'integer')]
    protected int $extensionId;

    #[OA\Property(property: 'to_buyer', description: '', type: 'string')]
    protected string $toBuyer;

    #[OA\Property(property: 'pay_note', description: '', type: 'string')]
    protected string $payNote;

    #[OA\Property(property: 'agency_id', description: '', type: 'integer')]
    protected int $agencyId;

    #[OA\Property(property: 'inv_type', description: '', type: 'string')]
    protected string $invType;

    #[OA\Property(property: 'tax', description: '', type: 'float')]
    protected float $tax;

    #[OA\Property(property: 'is_separate', description: '', type: 'integer')]
    protected int $isSeparate;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'discount', description: '', type: 'float')]
    protected float $discount;

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
    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    /**
     * 设置
     */
    public function setOrderStatus(int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * 获取
     */
    public function getShippingStatus(): int
    {
        return $this->shippingStatus;
    }

    /**
     * 设置
     */
    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shippingStatus = $shippingStatus;
    }

    /**
     * 获取
     */
    public function getPayStatus(): int
    {
        return $this->payStatus;
    }

    /**
     * 设置
     */
    public function setPayStatus(int $payStatus): void
    {
        $this->payStatus = $payStatus;
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
    public function getHowSurplus(): string
    {
        return $this->howSurplus;
    }

    /**
     * 设置
     */
    public function setHowSurplus(string $howSurplus): void
    {
        $this->howSurplus = $howSurplus;
    }

    /**
     * 获取
     */
    public function getPackName(): string
    {
        return $this->packName;
    }

    /**
     * 设置
     */
    public function setPackName(string $packName): void
    {
        $this->packName = $packName;
    }

    /**
     * 获取
     */
    public function getCardName(): string
    {
        return $this->cardName;
    }

    /**
     * 设置
     */
    public function setCardName(string $cardName): void
    {
        $this->cardName = $cardName;
    }

    /**
     * 获取
     */
    public function getCardMessage(): string
    {
        return $this->cardMessage;
    }

    /**
     * 设置
     */
    public function setCardMessage(string $cardMessage): void
    {
        $this->cardMessage = $cardMessage;
    }

    /**
     * 获取
     */
    public function getInvPayee(): string
    {
        return $this->invPayee;
    }

    /**
     * 设置
     */
    public function setInvPayee(string $invPayee): void
    {
        $this->invPayee = $invPayee;
    }

    /**
     * 获取
     */
    public function getInvContent(): string
    {
        return $this->invContent;
    }

    /**
     * 设置
     */
    public function setInvContent(string $invContent): void
    {
        $this->invContent = $invContent;
    }

    /**
     * 获取
     */
    public function getGoodsAmount(): float
    {
        return $this->goodsAmount;
    }

    /**
     * 设置
     */
    public function setGoodsAmount(float $goodsAmount): void
    {
        $this->goodsAmount = $goodsAmount;
    }

    /**
     * 获取
     */
    public function getShippingFee(): float
    {
        return $this->shippingFee;
    }

    /**
     * 设置
     */
    public function setShippingFee(float $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    /**
     * 获取
     */
    public function getInsureFee(): float
    {
        return $this->insureFee;
    }

    /**
     * 设置
     */
    public function setInsureFee(float $insureFee): void
    {
        $this->insureFee = $insureFee;
    }

    /**
     * 获取
     */
    public function getPayFee(): float
    {
        return $this->payFee;
    }

    /**
     * 设置
     */
    public function setPayFee(float $payFee): void
    {
        $this->payFee = $payFee;
    }

    /**
     * 获取
     */
    public function getPackFee(): float
    {
        return $this->packFee;
    }

    /**
     * 设置
     */
    public function setPackFee(float $packFee): void
    {
        $this->packFee = $packFee;
    }

    /**
     * 获取
     */
    public function getCardFee(): float
    {
        return $this->cardFee;
    }

    /**
     * 设置
     */
    public function setCardFee(float $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    /**
     * 获取
     */
    public function getMoneyPaid(): float
    {
        return $this->moneyPaid;
    }

    /**
     * 设置
     */
    public function setMoneyPaid(float $moneyPaid): void
    {
        $this->moneyPaid = $moneyPaid;
    }

    /**
     * 获取
     */
    public function getSurplus(): float
    {
        return $this->surplus;
    }

    /**
     * 设置
     */
    public function setSurplus(float $surplus): void
    {
        $this->surplus = $surplus;
    }

    /**
     * 获取
     */
    public function getIntegral(): int
    {
        return $this->integral;
    }

    /**
     * 设置
     */
    public function setIntegral(int $integral): void
    {
        $this->integral = $integral;
    }

    /**
     * 获取
     */
    public function getIntegralMoney(): float
    {
        return $this->integralMoney;
    }

    /**
     * 设置
     */
    public function setIntegralMoney(float $integralMoney): void
    {
        $this->integralMoney = $integralMoney;
    }

    /**
     * 获取
     */
    public function getBonus(): float
    {
        return $this->bonus;
    }

    /**
     * 设置
     */
    public function setBonus(float $bonus): void
    {
        $this->bonus = $bonus;
    }

    /**
     * 获取
     */
    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    /**
     * 设置
     */
    public function setOrderAmount(float $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * 获取
     */
    public function getFromAd(): int
    {
        return $this->fromAd;
    }

    /**
     * 设置
     */
    public function setFromAd(int $fromAd): void
    {
        $this->fromAd = $fromAd;
    }

    /**
     * 获取
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * 设置
     */
    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
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
    public function getConfirmTime(): int
    {
        return $this->confirmTime;
    }

    /**
     * 设置
     */
    public function setConfirmTime(int $confirmTime): void
    {
        $this->confirmTime = $confirmTime;
    }

    /**
     * 获取
     */
    public function getPayTime(): int
    {
        return $this->payTime;
    }

    /**
     * 设置
     */
    public function setPayTime(int $payTime): void
    {
        $this->payTime = $payTime;
    }

    /**
     * 获取
     */
    public function getShippingTime(): int
    {
        return $this->shippingTime;
    }

    /**
     * 设置
     */
    public function setShippingTime(int $shippingTime): void
    {
        $this->shippingTime = $shippingTime;
    }

    /**
     * 获取
     */
    public function getPackId(): int
    {
        return $this->packId;
    }

    /**
     * 设置
     */
    public function setPackId(int $packId): void
    {
        $this->packId = $packId;
    }

    /**
     * 获取
     */
    public function getCardId(): int
    {
        return $this->cardId;
    }

    /**
     * 设置
     */
    public function setCardId(int $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * 获取
     */
    public function getBonusId(): int
    {
        return $this->bonusId;
    }

    /**
     * 设置
     */
    public function setBonusId(int $bonusId): void
    {
        $this->bonusId = $bonusId;
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
    public function getExtensionCode(): string
    {
        return $this->extensionCode;
    }

    /**
     * 设置
     */
    public function setExtensionCode(string $extensionCode): void
    {
        $this->extensionCode = $extensionCode;
    }

    /**
     * 获取
     */
    public function getExtensionId(): int
    {
        return $this->extensionId;
    }

    /**
     * 设置
     */
    public function setExtensionId(int $extensionId): void
    {
        $this->extensionId = $extensionId;
    }

    /**
     * 获取
     */
    public function getToBuyer(): string
    {
        return $this->toBuyer;
    }

    /**
     * 设置
     */
    public function setToBuyer(string $toBuyer): void
    {
        $this->toBuyer = $toBuyer;
    }

    /**
     * 获取
     */
    public function getPayNote(): string
    {
        return $this->payNote;
    }

    /**
     * 设置
     */
    public function setPayNote(string $payNote): void
    {
        $this->payNote = $payNote;
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

    /**
     * 获取
     */
    public function getInvType(): string
    {
        return $this->invType;
    }

    /**
     * 设置
     */
    public function setInvType(string $invType): void
    {
        $this->invType = $invType;
    }

    /**
     * 获取
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * 设置
     */
    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * 获取
     */
    public function getIsSeparate(): int
    {
        return $this->isSeparate;
    }

    /**
     * 设置
     */
    public function setIsSeparate(int $isSeparate): void
    {
        $this->isSeparate = $isSeparate;
    }

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * 设置
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }
}

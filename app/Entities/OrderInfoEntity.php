<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderInfoEntity')]
class OrderInfoEntity
{
    use DTOHelper;

    const string getOrderId = 'order_id';

    const string getOrderSn = 'order_sn';

    const string getUserId = 'user_id';

    const string getOrderStatus = 'order_status';

    const string getShippingStatus = 'shipping_status';

    const string getPayStatus = 'pay_status';

    const string getConsignee = 'consignee';

    const string getCountry = 'country';

    const string getProvince = 'province';

    const string getCity = 'city';

    const string getDistrict = 'district';

    const string getAddress = 'address';

    const string getZipcode = 'zipcode';

    const string getTel = 'tel';

    const string getMobile = 'mobile';

    const string getEmail = 'email';

    const string getBestTime = 'best_time';

    const string getSignBuilding = 'sign_building';

    const string getPostscript = 'postscript';

    const string getShippingId = 'shipping_id';

    const string getShippingName = 'shipping_name';

    const string getPayId = 'pay_id';

    const string getPayName = 'pay_name';

    const string getHowOos = 'how_oos';

    const string getHowSurplus = 'how_surplus';

    const string getPackName = 'pack_name';

    const string getCardName = 'card_name';

    const string getCardMessage = 'card_message';

    const string getInvPayee = 'inv_payee';

    const string getInvContent = 'inv_content';

    const string getGoodsAmount = 'goods_amount';

    const string getShippingFee = 'shipping_fee';

    const string getInsureFee = 'insure_fee';

    const string getPayFee = 'pay_fee';

    const string getPackFee = 'pack_fee';

    const string getCardFee = 'card_fee';

    const string getMoneyPaid = 'money_paid';

    const string getSurplus = 'surplus';

    const string getIntegral = 'integral';

    const string getIntegralMoney = 'integral_money';

    const string getBonus = 'bonus';

    const string getOrderAmount = 'order_amount';

    const string getFromAd = 'from_ad';

    const string getReferer = 'referer';

    const string getAddTime = 'add_time';

    const string getConfirmTime = 'confirm_time';

    const string getPayTime = 'pay_time';

    const string getShippingTime = 'shipping_time';

    const string getPackId = 'pack_id';

    const string getCardId = 'card_id';

    const string getBonusId = 'bonus_id';

    const string getInvoiceNo = 'invoice_no';

    const string getExtensionCode = 'extension_code';

    const string getExtensionId = 'extension_id';

    const string getToBuyer = 'to_buyer';

    const string getPayNote = 'pay_note';

    const string getAgencyId = 'agency_id';

    const string getInvType = 'inv_type';

    const string getTax = 'tax';

    const string getIsSeparate = 'is_separate';

    const string getParentId = 'parent_id';

    const string getDiscount = 'discount';

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'orderSn', description: '', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'orderStatus', description: '', type: 'integer')]
    private int $orderStatus;

    #[OA\Property(property: 'shippingStatus', description: '', type: 'integer')]
    private int $shippingStatus;

    #[OA\Property(property: 'payStatus', description: '', type: 'integer')]
    private int $payStatus;

    #[OA\Property(property: 'consignee', description: '', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'country', description: '', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'address', description: '', type: 'string')]
    private string $address;

    #[OA\Property(property: 'zipcode', description: '', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'bestTime', description: '', type: 'string')]
    private string $bestTime;

    #[OA\Property(property: 'signBuilding', description: '', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'postscript', description: '', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'shippingId', description: '', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'shippingName', description: '', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'payId', description: '', type: 'integer')]
    private int $payId;

    #[OA\Property(property: 'payName', description: '', type: 'string')]
    private string $payName;

    #[OA\Property(property: 'howOos', description: '', type: 'string')]
    private string $howOos;

    #[OA\Property(property: 'howSurplus', description: '', type: 'string')]
    private string $howSurplus;

    #[OA\Property(property: 'packName', description: '', type: 'string')]
    private string $packName;

    #[OA\Property(property: 'cardName', description: '', type: 'string')]
    private string $cardName;

    #[OA\Property(property: 'cardMessage', description: '', type: 'string')]
    private string $cardMessage;

    #[OA\Property(property: 'invPayee', description: '', type: 'string')]
    private string $invPayee;

    #[OA\Property(property: 'invContent', description: '', type: 'string')]
    private string $invContent;

    #[OA\Property(property: 'goodsAmount', description: '', type: 'string')]
    private string $goodsAmount;

    #[OA\Property(property: 'shippingFee', description: '', type: 'string')]
    private string $shippingFee;

    #[OA\Property(property: 'insureFee', description: '', type: 'string')]
    private string $insureFee;

    #[OA\Property(property: 'payFee', description: '', type: 'string')]
    private string $payFee;

    #[OA\Property(property: 'packFee', description: '', type: 'string')]
    private string $packFee;

    #[OA\Property(property: 'cardFee', description: '', type: 'string')]
    private string $cardFee;

    #[OA\Property(property: 'moneyPaid', description: '', type: 'string')]
    private string $moneyPaid;

    #[OA\Property(property: 'surplus', description: '', type: 'string')]
    private string $surplus;

    #[OA\Property(property: 'integral', description: '', type: 'integer')]
    private int $integral;

    #[OA\Property(property: 'integralMoney', description: '', type: 'string')]
    private string $integralMoney;

    #[OA\Property(property: 'bonus', description: '', type: 'string')]
    private string $bonus;

    #[OA\Property(property: 'orderAmount', description: '', type: 'string')]
    private string $orderAmount;

    #[OA\Property(property: 'fromAd', description: '', type: 'integer')]
    private int $fromAd;

    #[OA\Property(property: 'referer', description: '', type: 'string')]
    private string $referer;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'confirmTime', description: '', type: 'integer')]
    private int $confirmTime;

    #[OA\Property(property: 'payTime', description: '', type: 'integer')]
    private int $payTime;

    #[OA\Property(property: 'shippingTime', description: '', type: 'integer')]
    private int $shippingTime;

    #[OA\Property(property: 'packId', description: '', type: 'integer')]
    private int $packId;

    #[OA\Property(property: 'cardId', description: '', type: 'integer')]
    private int $cardId;

    #[OA\Property(property: 'bonusId', description: '', type: 'integer')]
    private int $bonusId;

    #[OA\Property(property: 'invoiceNo', description: '', type: 'string')]
    private string $invoiceNo;

    #[OA\Property(property: 'extensionCode', description: '', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'extensionId', description: '', type: 'integer')]
    private int $extensionId;

    #[OA\Property(property: 'toBuyer', description: '', type: 'string')]
    private string $toBuyer;

    #[OA\Property(property: 'payNote', description: '', type: 'string')]
    private string $payNote;

    #[OA\Property(property: 'agencyId', description: '', type: 'integer')]
    private int $agencyId;

    #[OA\Property(property: 'invType', description: '', type: 'string')]
    private string $invType;

    #[OA\Property(property: 'tax', description: '', type: 'string')]
    private string $tax;

    #[OA\Property(property: 'isSeparate', description: '', type: 'integer')]
    private int $isSeparate;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'discount', description: '', type: 'string')]
    private string $discount;

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
    public function getGoodsAmount(): string
    {
        return $this->goodsAmount;
    }

    /**
     * 设置
     */
    public function setGoodsAmount(string $goodsAmount): void
    {
        $this->goodsAmount = $goodsAmount;
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
    public function getPackFee(): string
    {
        return $this->packFee;
    }

    /**
     * 设置
     */
    public function setPackFee(string $packFee): void
    {
        $this->packFee = $packFee;
    }

    /**
     * 获取
     */
    public function getCardFee(): string
    {
        return $this->cardFee;
    }

    /**
     * 设置
     */
    public function setCardFee(string $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    /**
     * 获取
     */
    public function getMoneyPaid(): string
    {
        return $this->moneyPaid;
    }

    /**
     * 设置
     */
    public function setMoneyPaid(string $moneyPaid): void
    {
        $this->moneyPaid = $moneyPaid;
    }

    /**
     * 获取
     */
    public function getSurplus(): string
    {
        return $this->surplus;
    }

    /**
     * 设置
     */
    public function setSurplus(string $surplus): void
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
    public function getIntegralMoney(): string
    {
        return $this->integralMoney;
    }

    /**
     * 设置
     */
    public function setIntegralMoney(string $integralMoney): void
    {
        $this->integralMoney = $integralMoney;
    }

    /**
     * 获取
     */
    public function getBonus(): string
    {
        return $this->bonus;
    }

    /**
     * 设置
     */
    public function setBonus(string $bonus): void
    {
        $this->bonus = $bonus;
    }

    /**
     * 获取
     */
    public function getOrderAmount(): string
    {
        return $this->orderAmount;
    }

    /**
     * 设置
     */
    public function setOrderAmount(string $orderAmount): void
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
    public function getTax(): string
    {
        return $this->tax;
    }

    /**
     * 设置
     */
    public function setTax(string $tax): void
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
    public function getDiscount(): string
    {
        return $this->discount;
    }

    /**
     * 设置
     */
    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }
}

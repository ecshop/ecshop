<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderInfo;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderInfoResponse')]
class OrderInfoResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '订单ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'orderSn', description: '订单编号', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'orderStatus', description: '订单状态', type: 'integer')]
    private int $orderStatus;

    #[OA\Property(property: 'shippingStatus', description: '配送状态', type: 'integer')]
    private int $shippingStatus;

    #[OA\Property(property: 'payStatus', description: '支付状态', type: 'integer')]
    private int $payStatus;

    #[OA\Property(property: 'consignee', description: '收货人', type: 'string')]
    private string $consignee;

    #[OA\Property(property: 'country', description: '国家ID', type: 'integer')]
    private int $country;

    #[OA\Property(property: 'province', description: '省份ID', type: 'integer')]
    private int $province;

    #[OA\Property(property: 'city', description: '城市ID', type: 'integer')]
    private int $city;

    #[OA\Property(property: 'district', description: '区县ID', type: 'integer')]
    private int $district;

    #[OA\Property(property: 'address', description: '详细地址', type: 'string')]
    private string $address;

    #[OA\Property(property: 'zipcode', description: '邮编', type: 'string')]
    private string $zipcode;

    #[OA\Property(property: 'tel', description: '电话', type: 'string')]
    private string $tel;

    #[OA\Property(property: 'mobile', description: '手机', type: 'string')]
    private string $mobile;

    #[OA\Property(property: 'email', description: '邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'bestTime', description: '最佳送货时间', type: 'string')]
    private string $bestTime;

    #[OA\Property(property: 'signBuilding', description: '标志性建筑', type: 'string')]
    private string $signBuilding;

    #[OA\Property(property: 'postscript', description: '订单附言', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'shippingId', description: '配送方式ID', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'shippingName', description: '配送方式名称', type: 'string')]
    private string $shippingName;

    #[OA\Property(property: 'payId', description: '支付方式ID', type: 'integer')]
    private int $payId;

    #[OA\Property(property: 'payName', description: '支付方式名称', type: 'string')]
    private string $payName;

    #[OA\Property(property: 'howOos', description: '缺货处理方式', type: 'string')]
    private string $howOos;

    #[OA\Property(property: 'howSurplus', description: '余额处理方式', type: 'string')]
    private string $howSurplus;

    #[OA\Property(property: 'packName', description: '包装名称', type: 'string')]
    private string $packName;

    #[OA\Property(property: 'cardName', description: '贺卡名称', type: 'string')]
    private string $cardName;

    #[OA\Property(property: 'cardMessage', description: '贺卡留言', type: 'string')]
    private string $cardMessage;

    #[OA\Property(property: 'invPayee', description: '发票抬头', type: 'string')]
    private string $invPayee;

    #[OA\Property(property: 'invContent', description: '发票内容', type: 'string')]
    private string $invContent;

    #[OA\Property(property: 'goodsAmount', description: '商品总金额', type: 'float')]
    private float $goodsAmount;

    #[OA\Property(property: 'shippingFee', description: '配送费用', type: 'float')]
    private float $shippingFee;

    #[OA\Property(property: 'insureFee', description: '保价费用', type: 'float')]
    private float $insureFee;

    #[OA\Property(property: 'payFee', description: '支付手续费', type: 'float')]
    private float $payFee;

    #[OA\Property(property: 'packFee', description: '包装费用', type: 'float')]
    private float $packFee;

    #[OA\Property(property: 'cardFee', description: '贺卡费用', type: 'float')]
    private float $cardFee;

    #[OA\Property(property: 'moneyPaid', description: '已付款金额', type: 'float')]
    private float $moneyPaid;

    #[OA\Property(property: 'surplus', description: '余额支付金额', type: 'float')]
    private float $surplus;

    #[OA\Property(property: 'integral', description: '使用积分', type: 'integer')]
    private int $integral;

    #[OA\Property(property: 'integralMoney', description: '积分抵扣金额', type: 'float')]
    private float $integralMoney;

    #[OA\Property(property: 'bonus', description: '红包金额', type: 'float')]
    private float $bonus;

    #[OA\Property(property: 'orderAmount', description: '订单总金额', type: 'float')]
    private float $orderAmount;

    #[OA\Property(property: 'fromAd', description: '来源广告ID', type: 'integer')]
    private int $fromAd;

    #[OA\Property(property: 'referer', description: '来源页面', type: 'string')]
    private string $referer;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'confirmTime', description: '确认时间', type: 'integer')]
    private int $confirmTime;

    #[OA\Property(property: 'payTime', description: '支付时间', type: 'integer')]
    private int $payTime;

    #[OA\Property(property: 'shippingTime', description: '发货时间', type: 'integer')]
    private int $shippingTime;

    #[OA\Property(property: 'packId', description: '包装ID', type: 'integer')]
    private int $packId;

    #[OA\Property(property: 'cardId', description: '贺卡ID', type: 'integer')]
    private int $cardId;

    #[OA\Property(property: 'bonusId', description: '红包ID', type: 'integer')]
    private int $bonusId;

    #[OA\Property(property: 'invoiceNo', description: '发货单号', type: 'string')]
    private string $invoiceNo;

    #[OA\Property(property: 'extensionCode', description: '扩展代码', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'extensionId', description: '扩展ID', type: 'integer')]
    private int $extensionId;

    #[OA\Property(property: 'toBuyer', description: '给买家留言', type: 'string')]
    private string $toBuyer;

    #[OA\Property(property: 'payNote', description: '支付备注', type: 'string')]
    private string $payNote;

    #[OA\Property(property: 'agencyId', description: '办事处ID', type: 'integer')]
    private int $agencyId;

    #[OA\Property(property: 'invType', description: '发票类型', type: 'string')]
    private string $invType;

    #[OA\Property(property: 'tax', description: '税费', type: 'float')]
    private float $tax;

    #[OA\Property(property: 'isSeparate', description: '是否分单', type: 'integer')]
    private int $isSeparate;

    #[OA\Property(property: 'parentId', description: '父订单ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'discount', description: '折扣金额', type: 'float')]
    private float $discount;

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

    public function getOrderSn(): string
    {
        return $this->orderSn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->orderSn = $orderSn;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    public function getShippingStatus(): int
    {
        return $this->shippingStatus;
    }

    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shippingStatus = $shippingStatus;
    }

    public function getPayStatus(): int
    {
        return $this->payStatus;
    }

    public function setPayStatus(int $payStatus): void
    {
        $this->payStatus = $payStatus;
    }

    public function getConsignee(): string
    {
        return $this->consignee;
    }

    public function setConsignee(string $consignee): void
    {
        $this->consignee = $consignee;
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

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getBestTime(): string
    {
        return $this->bestTime;
    }

    public function setBestTime(string $bestTime): void
    {
        $this->bestTime = $bestTime;
    }

    public function getSignBuilding(): string
    {
        return $this->signBuilding;
    }

    public function setSignBuilding(string $signBuilding): void
    {
        $this->signBuilding = $signBuilding;
    }

    public function getPostscript(): string
    {
        return $this->postscript;
    }

    public function setPostscript(string $postscript): void
    {
        $this->postscript = $postscript;
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

    public function getPayId(): int
    {
        return $this->payId;
    }

    public function setPayId(int $payId): void
    {
        $this->payId = $payId;
    }

    public function getPayName(): string
    {
        return $this->payName;
    }

    public function setPayName(string $payName): void
    {
        $this->payName = $payName;
    }

    public function getHowOos(): string
    {
        return $this->howOos;
    }

    public function setHowOos(string $howOos): void
    {
        $this->howOos = $howOos;
    }

    public function getHowSurplus(): string
    {
        return $this->howSurplus;
    }

    public function setHowSurplus(string $howSurplus): void
    {
        $this->howSurplus = $howSurplus;
    }

    public function getPackName(): string
    {
        return $this->packName;
    }

    public function setPackName(string $packName): void
    {
        $this->packName = $packName;
    }

    public function getCardName(): string
    {
        return $this->cardName;
    }

    public function setCardName(string $cardName): void
    {
        $this->cardName = $cardName;
    }

    public function getCardMessage(): string
    {
        return $this->cardMessage;
    }

    public function setCardMessage(string $cardMessage): void
    {
        $this->cardMessage = $cardMessage;
    }

    public function getInvPayee(): string
    {
        return $this->invPayee;
    }

    public function setInvPayee(string $invPayee): void
    {
        $this->invPayee = $invPayee;
    }

    public function getInvContent(): string
    {
        return $this->invContent;
    }

    public function setInvContent(string $invContent): void
    {
        $this->invContent = $invContent;
    }

    public function getGoodsAmount(): float
    {
        return $this->goodsAmount;
    }

    public function setGoodsAmount(float $goodsAmount): void
    {
        $this->goodsAmount = $goodsAmount;
    }

    public function getShippingFee(): float
    {
        return $this->shippingFee;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    public function getInsureFee(): float
    {
        return $this->insureFee;
    }

    public function setInsureFee(float $insureFee): void
    {
        $this->insureFee = $insureFee;
    }

    public function getPayFee(): float
    {
        return $this->payFee;
    }

    public function setPayFee(float $payFee): void
    {
        $this->payFee = $payFee;
    }

    public function getPackFee(): float
    {
        return $this->packFee;
    }

    public function setPackFee(float $packFee): void
    {
        $this->packFee = $packFee;
    }

    public function getCardFee(): float
    {
        return $this->cardFee;
    }

    public function setCardFee(float $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    public function getMoneyPaid(): float
    {
        return $this->moneyPaid;
    }

    public function setMoneyPaid(float $moneyPaid): void
    {
        $this->moneyPaid = $moneyPaid;
    }

    public function getSurplus(): float
    {
        return $this->surplus;
    }

    public function setSurplus(float $surplus): void
    {
        $this->surplus = $surplus;
    }

    public function getIntegral(): int
    {
        return $this->integral;
    }

    public function setIntegral(int $integral): void
    {
        $this->integral = $integral;
    }

    public function getIntegralMoney(): float
    {
        return $this->integralMoney;
    }

    public function setIntegralMoney(float $integralMoney): void
    {
        $this->integralMoney = $integralMoney;
    }

    public function getBonus(): float
    {
        return $this->bonus;
    }

    public function setBonus(float $bonus): void
    {
        $this->bonus = $bonus;
    }

    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    public function setOrderAmount(float $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    public function getFromAd(): int
    {
        return $this->fromAd;
    }

    public function setFromAd(int $fromAd): void
    {
        $this->fromAd = $fromAd;
    }

    public function getReferer(): string
    {
        return $this->referer;
    }

    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getConfirmTime(): int
    {
        return $this->confirmTime;
    }

    public function setConfirmTime(int $confirmTime): void
    {
        $this->confirmTime = $confirmTime;
    }

    public function getPayTime(): int
    {
        return $this->payTime;
    }

    public function setPayTime(int $payTime): void
    {
        $this->payTime = $payTime;
    }

    public function getShippingTime(): int
    {
        return $this->shippingTime;
    }

    public function setShippingTime(int $shippingTime): void
    {
        $this->shippingTime = $shippingTime;
    }

    public function getPackId(): int
    {
        return $this->packId;
    }

    public function setPackId(int $packId): void
    {
        $this->packId = $packId;
    }

    public function getCardId(): int
    {
        return $this->cardId;
    }

    public function setCardId(int $cardId): void
    {
        $this->cardId = $cardId;
    }

    public function getBonusId(): int
    {
        return $this->bonusId;
    }

    public function setBonusId(int $bonusId): void
    {
        $this->bonusId = $bonusId;
    }

    public function getInvoiceNo(): string
    {
        return $this->invoiceNo;
    }

    public function setInvoiceNo(string $invoiceNo): void
    {
        $this->invoiceNo = $invoiceNo;
    }

    public function getExtensionCode(): string
    {
        return $this->extensionCode;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extensionCode = $extensionCode;
    }

    public function getExtensionId(): int
    {
        return $this->extensionId;
    }

    public function setExtensionId(int $extensionId): void
    {
        $this->extensionId = $extensionId;
    }

    public function getToBuyer(): string
    {
        return $this->toBuyer;
    }

    public function setToBuyer(string $toBuyer): void
    {
        $this->toBuyer = $toBuyer;
    }

    public function getPayNote(): string
    {
        return $this->payNote;
    }

    public function setPayNote(string $payNote): void
    {
        $this->payNote = $payNote;
    }

    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
    }

    public function getInvType(): string
    {
        return $this->invType;
    }

    public function setInvType(string $invType): void
    {
        $this->invType = $invType;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    public function getIsSeparate(): int
    {
        return $this->isSeparate;
    }

    public function setIsSeparate(int $isSeparate): void
    {
        $this->isSeparate = $isSeparate;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
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

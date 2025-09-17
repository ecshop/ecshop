<?php

declare(strict_types=1);

namespace app\bundles\order\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderInfoEntity')]
class OrderInfoEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '订单ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'order_sn', description: '订单编号', type: 'string')]
    private string $order_sn;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'order_status', description: '订单状态', type: 'integer')]
    private int $order_status;

    #[OA\Property(property: 'shipping_status', description: '配送状态', type: 'integer')]
    private int $shipping_status;

    #[OA\Property(property: 'pay_status', description: '支付状态', type: 'integer')]
    private int $pay_status;

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

    #[OA\Property(property: 'best_time', description: '最佳送货时间', type: 'string')]
    private string $best_time;

    #[OA\Property(property: 'sign_building', description: '标志性建筑', type: 'string')]
    private string $sign_building;

    #[OA\Property(property: 'postscript', description: '订单附言', type: 'string')]
    private string $postscript;

    #[OA\Property(property: 'shipping_id', description: '配送方式ID', type: 'integer')]
    private int $shipping_id;

    #[OA\Property(property: 'shipping_name', description: '配送方式名称', type: 'string')]
    private string $shipping_name;

    #[OA\Property(property: 'pay_id', description: '支付方式ID', type: 'integer')]
    private int $pay_id;

    #[OA\Property(property: 'pay_name', description: '支付方式名称', type: 'string')]
    private string $pay_name;

    #[OA\Property(property: 'how_oos', description: '缺货处理方式', type: 'string')]
    private string $how_oos;

    #[OA\Property(property: 'how_surplus', description: '余额处理方式', type: 'string')]
    private string $how_surplus;

    #[OA\Property(property: 'pack_name', description: '包装名称', type: 'string')]
    private string $pack_name;

    #[OA\Property(property: 'card_name', description: '贺卡名称', type: 'string')]
    private string $card_name;

    #[OA\Property(property: 'card_message', description: '贺卡留言', type: 'string')]
    private string $card_message;

    #[OA\Property(property: 'inv_payee', description: '发票抬头', type: 'string')]
    private string $inv_payee;

    #[OA\Property(property: 'inv_content', description: '发票内容', type: 'string')]
    private string $inv_content;

    #[OA\Property(property: 'goods_amount', description: '商品总金额', type: 'float')]
    private float $goods_amount;

    #[OA\Property(property: 'shipping_fee', description: '配送费用', type: 'float')]
    private float $shipping_fee;

    #[OA\Property(property: 'insure_fee', description: '保价费用', type: 'float')]
    private float $insure_fee;

    #[OA\Property(property: 'pay_fee', description: '支付手续费', type: 'float')]
    private float $pay_fee;

    #[OA\Property(property: 'pack_fee', description: '包装费用', type: 'float')]
    private float $pack_fee;

    #[OA\Property(property: 'card_fee', description: '贺卡费用', type: 'float')]
    private float $card_fee;

    #[OA\Property(property: 'money_paid', description: '已付款金额', type: 'float')]
    private float $money_paid;

    #[OA\Property(property: 'surplus', description: '余额支付金额', type: 'float')]
    private float $surplus;

    #[OA\Property(property: 'integral', description: '使用积分', type: 'integer')]
    private int $integral;

    #[OA\Property(property: 'integral_money', description: '积分抵扣金额', type: 'float')]
    private float $integral_money;

    #[OA\Property(property: 'bonus', description: '红包金额', type: 'float')]
    private float $bonus;

    #[OA\Property(property: 'order_amount', description: '订单总金额', type: 'float')]
    private float $order_amount;

    #[OA\Property(property: 'from_ad', description: '来源广告ID', type: 'integer')]
    private int $from_ad;

    #[OA\Property(property: 'referer', description: '来源页面', type: 'string')]
    private string $referer;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'confirm_time', description: '确认时间', type: 'integer')]
    private int $confirm_time;

    #[OA\Property(property: 'pay_time', description: '支付时间', type: 'integer')]
    private int $pay_time;

    #[OA\Property(property: 'shipping_time', description: '发货时间', type: 'integer')]
    private int $shipping_time;

    #[OA\Property(property: 'pack_id', description: '包装ID', type: 'integer')]
    private int $pack_id;

    #[OA\Property(property: 'card_id', description: '贺卡ID', type: 'integer')]
    private int $card_id;

    #[OA\Property(property: 'bonus_id', description: '红包ID', type: 'integer')]
    private int $bonus_id;

    #[OA\Property(property: 'invoice_no', description: '发货单号', type: 'string')]
    private string $invoice_no;

    #[OA\Property(property: 'extension_code', description: '扩展代码', type: 'string')]
    private string $extension_code;

    #[OA\Property(property: 'extension_id', description: '扩展ID', type: 'integer')]
    private int $extension_id;

    #[OA\Property(property: 'to_buyer', description: '给买家留言', type: 'string')]
    private string $to_buyer;

    #[OA\Property(property: 'pay_note', description: '支付备注', type: 'string')]
    private string $pay_note;

    #[OA\Property(property: 'agency_id', description: '办事处ID', type: 'integer')]
    private int $agency_id;

    #[OA\Property(property: 'inv_type', description: '发票类型', type: 'string')]
    private string $inv_type;

    #[OA\Property(property: 'tax', description: '税费', type: 'float')]
    private float $tax;

    #[OA\Property(property: 'is_separate', description: '是否分单', type: 'integer')]
    private int $is_separate;

    #[OA\Property(property: 'parent_id', description: '父订单ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'discount', description: '折扣金额', type: 'float')]
    private float $discount;

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

    public function getOrderSn(): string
    {
        return $this->order_sn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->order_sn = $orderSn;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getOrderStatus(): int
    {
        return $this->order_status;
    }

    public function setOrderStatus(int $orderStatus): void
    {
        $this->order_status = $orderStatus;
    }

    public function getShippingStatus(): int
    {
        return $this->shipping_status;
    }

    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shipping_status = $shippingStatus;
    }

    public function getPayStatus(): int
    {
        return $this->pay_status;
    }

    public function setPayStatus(int $payStatus): void
    {
        $this->pay_status = $payStatus;
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
        return $this->best_time;
    }

    public function setBestTime(string $bestTime): void
    {
        $this->best_time = $bestTime;
    }

    public function getSignBuilding(): string
    {
        return $this->sign_building;
    }

    public function setSignBuilding(string $signBuilding): void
    {
        $this->sign_building = $signBuilding;
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

    public function getPayId(): int
    {
        return $this->pay_id;
    }

    public function setPayId(int $payId): void
    {
        $this->pay_id = $payId;
    }

    public function getPayName(): string
    {
        return $this->pay_name;
    }

    public function setPayName(string $payName): void
    {
        $this->pay_name = $payName;
    }

    public function getHowOos(): string
    {
        return $this->how_oos;
    }

    public function setHowOos(string $howOos): void
    {
        $this->how_oos = $howOos;
    }

    public function getHowSurplus(): string
    {
        return $this->how_surplus;
    }

    public function setHowSurplus(string $howSurplus): void
    {
        $this->how_surplus = $howSurplus;
    }

    public function getPackName(): string
    {
        return $this->pack_name;
    }

    public function setPackName(string $packName): void
    {
        $this->pack_name = $packName;
    }

    public function getCardName(): string
    {
        return $this->card_name;
    }

    public function setCardName(string $cardName): void
    {
        $this->card_name = $cardName;
    }

    public function getCardMessage(): string
    {
        return $this->card_message;
    }

    public function setCardMessage(string $cardMessage): void
    {
        $this->card_message = $cardMessage;
    }

    public function getInvPayee(): string
    {
        return $this->inv_payee;
    }

    public function setInvPayee(string $invPayee): void
    {
        $this->inv_payee = $invPayee;
    }

    public function getInvContent(): string
    {
        return $this->inv_content;
    }

    public function setInvContent(string $invContent): void
    {
        $this->inv_content = $invContent;
    }

    public function getGoodsAmount(): float
    {
        return $this->goods_amount;
    }

    public function setGoodsAmount(float $goodsAmount): void
    {
        $this->goods_amount = $goodsAmount;
    }

    public function getShippingFee(): float
    {
        return $this->shipping_fee;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shipping_fee = $shippingFee;
    }

    public function getInsureFee(): float
    {
        return $this->insure_fee;
    }

    public function setInsureFee(float $insureFee): void
    {
        $this->insure_fee = $insureFee;
    }

    public function getPayFee(): float
    {
        return $this->pay_fee;
    }

    public function setPayFee(float $payFee): void
    {
        $this->pay_fee = $payFee;
    }

    public function getPackFee(): float
    {
        return $this->pack_fee;
    }

    public function setPackFee(float $packFee): void
    {
        $this->pack_fee = $packFee;
    }

    public function getCardFee(): float
    {
        return $this->card_fee;
    }

    public function setCardFee(float $cardFee): void
    {
        $this->card_fee = $cardFee;
    }

    public function getMoneyPaid(): float
    {
        return $this->money_paid;
    }

    public function setMoneyPaid(float $moneyPaid): void
    {
        $this->money_paid = $moneyPaid;
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
        return $this->integral_money;
    }

    public function setIntegralMoney(float $integralMoney): void
    {
        $this->integral_money = $integralMoney;
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
        return $this->order_amount;
    }

    public function setOrderAmount(float $orderAmount): void
    {
        $this->order_amount = $orderAmount;
    }

    public function getFromAd(): int
    {
        return $this->from_ad;
    }

    public function setFromAd(int $fromAd): void
    {
        $this->from_ad = $fromAd;
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
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getConfirmTime(): int
    {
        return $this->confirm_time;
    }

    public function setConfirmTime(int $confirmTime): void
    {
        $this->confirm_time = $confirmTime;
    }

    public function getPayTime(): int
    {
        return $this->pay_time;
    }

    public function setPayTime(int $payTime): void
    {
        $this->pay_time = $payTime;
    }

    public function getShippingTime(): int
    {
        return $this->shipping_time;
    }

    public function setShippingTime(int $shippingTime): void
    {
        $this->shipping_time = $shippingTime;
    }

    public function getPackId(): int
    {
        return $this->pack_id;
    }

    public function setPackId(int $packId): void
    {
        $this->pack_id = $packId;
    }

    public function getCardId(): int
    {
        return $this->card_id;
    }

    public function setCardId(int $cardId): void
    {
        $this->card_id = $cardId;
    }

    public function getBonusId(): int
    {
        return $this->bonus_id;
    }

    public function setBonusId(int $bonusId): void
    {
        $this->bonus_id = $bonusId;
    }

    public function getInvoiceNo(): string
    {
        return $this->invoice_no;
    }

    public function setInvoiceNo(string $invoiceNo): void
    {
        $this->invoice_no = $invoiceNo;
    }

    public function getExtensionCode(): string
    {
        return $this->extension_code;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extension_code = $extensionCode;
    }

    public function getExtensionId(): int
    {
        return $this->extension_id;
    }

    public function setExtensionId(int $extensionId): void
    {
        $this->extension_id = $extensionId;
    }

    public function getToBuyer(): string
    {
        return $this->to_buyer;
    }

    public function setToBuyer(string $toBuyer): void
    {
        $this->to_buyer = $toBuyer;
    }

    public function getPayNote(): string
    {
        return $this->pay_note;
    }

    public function setPayNote(string $payNote): void
    {
        $this->pay_note = $payNote;
    }

    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agency_id = $agencyId;
    }

    public function getInvType(): string
    {
        return $this->inv_type;
    }

    public function setInvType(string $invType): void
    {
        $this->inv_type = $invType;
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
        return $this->is_separate;
    }

    public function setIsSeparate(int $isSeparate): void
    {
        $this->is_separate = $isSeparate;
    }

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
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

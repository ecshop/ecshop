<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\OrderInfo;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'OrderInfoUpdateRequest',
    required: [
        self::getOrderId,
        self::getOrderSn,
        self::getUserId,
        self::getOrderStatus,
        self::getShippingStatus,
        self::getPayStatus,
        self::getConsignee,
        self::getCountry,
        self::getProvince,
        self::getCity,
        self::getDistrict,
        self::getAddress,
        self::getZipcode,
        self::getTel,
        self::getMobile,
        self::getEmail,
        self::getBestTime,
        self::getSignBuilding,
        self::getPostscript,
        self::getShippingId,
        self::getShippingName,
        self::getPayId,
        self::getPayName,
        self::getHowOos,
        self::getHowSurplus,
        self::getPackName,
        self::getCardName,
        self::getCardMessage,
        self::getInvPayee,
        self::getInvContent,
        self::getGoodsAmount,
        self::getShippingFee,
        self::getInsureFee,
        self::getPayFee,
        self::getPackFee,
        self::getCardFee,
        self::getMoneyPaid,
        self::getSurplus,
        self::getIntegral,
        self::getIntegralMoney,
        self::getBonus,
        self::getOrderAmount,
        self::getFromAd,
        self::getReferer,
        self::getAddTime,
        self::getConfirmTime,
        self::getPayTime,
        self::getShippingTime,
        self::getPackId,
        self::getCardId,
        self::getBonusId,
        self::getInvoiceNo,
        self::getExtensionCode,
        self::getExtensionId,
        self::getToBuyer,
        self::getPayNote,
        self::getAgencyId,
        self::getInvType,
        self::getTax,
        self::getIsSeparate,
        self::getParentId,
        self::getDiscount,
    ],
    properties: [
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderSn, description: '', type: 'string'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getPayStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getConsignee, description: '', type: 'string'),
        new OA\Property(property: self::getCountry, description: '', type: 'integer'),
        new OA\Property(property: self::getProvince, description: '', type: 'integer'),
        new OA\Property(property: self::getCity, description: '', type: 'integer'),
        new OA\Property(property: self::getDistrict, description: '', type: 'integer'),
        new OA\Property(property: self::getAddress, description: '', type: 'string'),
        new OA\Property(property: self::getZipcode, description: '', type: 'string'),
        new OA\Property(property: self::getTel, description: '', type: 'string'),
        new OA\Property(property: self::getMobile, description: '', type: 'string'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getBestTime, description: '', type: 'string'),
        new OA\Property(property: self::getSignBuilding, description: '', type: 'string'),
        new OA\Property(property: self::getPostscript, description: '', type: 'string'),
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingName, description: '', type: 'string'),
        new OA\Property(property: self::getPayId, description: '', type: 'integer'),
        new OA\Property(property: self::getPayName, description: '', type: 'string'),
        new OA\Property(property: self::getHowOos, description: '', type: 'string'),
        new OA\Property(property: self::getHowSurplus, description: '', type: 'string'),
        new OA\Property(property: self::getPackName, description: '', type: 'string'),
        new OA\Property(property: self::getCardName, description: '', type: 'string'),
        new OA\Property(property: self::getCardMessage, description: '', type: 'string'),
        new OA\Property(property: self::getInvPayee, description: '', type: 'string'),
        new OA\Property(property: self::getInvContent, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsAmount, description: '', type: 'string'),
        new OA\Property(property: self::getShippingFee, description: '', type: 'string'),
        new OA\Property(property: self::getInsureFee, description: '', type: 'string'),
        new OA\Property(property: self::getPayFee, description: '', type: 'string'),
        new OA\Property(property: self::getPackFee, description: '', type: 'string'),
        new OA\Property(property: self::getCardFee, description: '', type: 'string'),
        new OA\Property(property: self::getMoneyPaid, description: '', type: 'string'),
        new OA\Property(property: self::getSurplus, description: '', type: 'string'),
        new OA\Property(property: self::getIntegral, description: '', type: 'integer'),
        new OA\Property(property: self::getIntegralMoney, description: '', type: 'string'),
        new OA\Property(property: self::getBonus, description: '', type: 'string'),
        new OA\Property(property: self::getOrderAmount, description: '', type: 'string'),
        new OA\Property(property: self::getFromAd, description: '', type: 'integer'),
        new OA\Property(property: self::getReferer, description: '', type: 'string'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getConfirmTime, description: '', type: 'integer'),
        new OA\Property(property: self::getPayTime, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingTime, description: '', type: 'integer'),
        new OA\Property(property: self::getPackId, description: '', type: 'integer'),
        new OA\Property(property: self::getCardId, description: '', type: 'integer'),
        new OA\Property(property: self::getBonusId, description: '', type: 'integer'),
        new OA\Property(property: self::getInvoiceNo, description: '', type: 'string'),
        new OA\Property(property: self::getExtensionCode, description: '', type: 'string'),
        new OA\Property(property: self::getExtensionId, description: '', type: 'integer'),
        new OA\Property(property: self::getToBuyer, description: '', type: 'string'),
        new OA\Property(property: self::getPayNote, description: '', type: 'string'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
        new OA\Property(property: self::getInvType, description: '', type: 'string'),
        new OA\Property(property: self::getTax, description: '', type: 'string'),
        new OA\Property(property: self::getIsSeparate, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getDiscount, description: '', type: 'string'),
    ]
)]
class OrderInfoUpdateRequest extends FormRequest
{
    const string getOrderId = 'orderId';

    const string getOrderSn = 'orderSn';

    const string getUserId = 'userId';

    const string getOrderStatus = 'orderStatus';

    const string getShippingStatus = 'shippingStatus';

    const string getPayStatus = 'payStatus';

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

    const string getBestTime = 'bestTime';

    const string getSignBuilding = 'signBuilding';

    const string getPostscript = 'postscript';

    const string getShippingId = 'shippingId';

    const string getShippingName = 'shippingName';

    const string getPayId = 'payId';

    const string getPayName = 'payName';

    const string getHowOos = 'howOos';

    const string getHowSurplus = 'howSurplus';

    const string getPackName = 'packName';

    const string getCardName = 'cardName';

    const string getCardMessage = 'cardMessage';

    const string getInvPayee = 'invPayee';

    const string getInvContent = 'invContent';

    const string getGoodsAmount = 'goodsAmount';

    const string getShippingFee = 'shippingFee';

    const string getInsureFee = 'insureFee';

    const string getPayFee = 'payFee';

    const string getPackFee = 'packFee';

    const string getCardFee = 'cardFee';

    const string getMoneyPaid = 'moneyPaid';

    const string getSurplus = 'surplus';

    const string getIntegral = 'integral';

    const string getIntegralMoney = 'integralMoney';

    const string getBonus = 'bonus';

    const string getOrderAmount = 'orderAmount';

    const string getFromAd = 'fromAd';

    const string getReferer = 'referer';

    const string getAddTime = 'addTime';

    const string getConfirmTime = 'confirmTime';

    const string getPayTime = 'payTime';

    const string getShippingTime = 'shippingTime';

    const string getPackId = 'packId';

    const string getCardId = 'cardId';

    const string getBonusId = 'bonusId';

    const string getInvoiceNo = 'invoiceNo';

    const string getExtensionCode = 'extensionCode';

    const string getExtensionId = 'extensionId';

    const string getToBuyer = 'toBuyer';

    const string getPayNote = 'payNote';

    const string getAgencyId = 'agencyId';

    const string getInvType = 'invType';

    const string getTax = 'tax';

    const string getIsSeparate = 'isSeparate';

    const string getParentId = 'parentId';

    const string getDiscount = 'discount';

    public function rules(): array
    {
        return [
            self::getOrderId => 'required',
            self::getOrderSn => 'required',
            self::getUserId => 'required',
            self::getOrderStatus => 'required',
            self::getShippingStatus => 'required',
            self::getPayStatus => 'required',
            self::getConsignee => 'required',
            self::getCountry => 'required',
            self::getProvince => 'required',
            self::getCity => 'required',
            self::getDistrict => 'required',
            self::getAddress => 'required',
            self::getZipcode => 'required',
            self::getTel => 'required',
            self::getMobile => 'required',
            self::getEmail => 'required',
            self::getBestTime => 'required',
            self::getSignBuilding => 'required',
            self::getPostscript => 'required',
            self::getShippingId => 'required',
            self::getShippingName => 'required',
            self::getPayId => 'required',
            self::getPayName => 'required',
            self::getHowOos => 'required',
            self::getHowSurplus => 'required',
            self::getPackName => 'required',
            self::getCardName => 'required',
            self::getCardMessage => 'required',
            self::getInvPayee => 'required',
            self::getInvContent => 'required',
            self::getGoodsAmount => 'required',
            self::getShippingFee => 'required',
            self::getInsureFee => 'required',
            self::getPayFee => 'required',
            self::getPackFee => 'required',
            self::getCardFee => 'required',
            self::getMoneyPaid => 'required',
            self::getSurplus => 'required',
            self::getIntegral => 'required',
            self::getIntegralMoney => 'required',
            self::getBonus => 'required',
            self::getOrderAmount => 'required',
            self::getFromAd => 'required',
            self::getReferer => 'required',
            self::getAddTime => 'required',
            self::getConfirmTime => 'required',
            self::getPayTime => 'required',
            self::getShippingTime => 'required',
            self::getPackId => 'required',
            self::getCardId => 'required',
            self::getBonusId => 'required',
            self::getInvoiceNo => 'required',
            self::getExtensionCode => 'required',
            self::getExtensionId => 'required',
            self::getToBuyer => 'required',
            self::getPayNote => 'required',
            self::getAgencyId => 'required',
            self::getInvType => 'required',
            self::getTax => 'required',
            self::getIsSeparate => 'required',
            self::getParentId => 'required',
            self::getDiscount => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getOrderId.'.required' => '请设置',
            self::getOrderSn.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getOrderStatus.'.required' => '请设置',
            self::getShippingStatus.'.required' => '请设置',
            self::getPayStatus.'.required' => '请设置',
            self::getConsignee.'.required' => '请设置',
            self::getCountry.'.required' => '请设置',
            self::getProvince.'.required' => '请设置',
            self::getCity.'.required' => '请设置',
            self::getDistrict.'.required' => '请设置',
            self::getAddress.'.required' => '请设置',
            self::getZipcode.'.required' => '请设置',
            self::getTel.'.required' => '请设置',
            self::getMobile.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getBestTime.'.required' => '请设置',
            self::getSignBuilding.'.required' => '请设置',
            self::getPostscript.'.required' => '请设置',
            self::getShippingId.'.required' => '请设置',
            self::getShippingName.'.required' => '请设置',
            self::getPayId.'.required' => '请设置',
            self::getPayName.'.required' => '请设置',
            self::getHowOos.'.required' => '请设置',
            self::getHowSurplus.'.required' => '请设置',
            self::getPackName.'.required' => '请设置',
            self::getCardName.'.required' => '请设置',
            self::getCardMessage.'.required' => '请设置',
            self::getInvPayee.'.required' => '请设置',
            self::getInvContent.'.required' => '请设置',
            self::getGoodsAmount.'.required' => '请设置',
            self::getShippingFee.'.required' => '请设置',
            self::getInsureFee.'.required' => '请设置',
            self::getPayFee.'.required' => '请设置',
            self::getPackFee.'.required' => '请设置',
            self::getCardFee.'.required' => '请设置',
            self::getMoneyPaid.'.required' => '请设置',
            self::getSurplus.'.required' => '请设置',
            self::getIntegral.'.required' => '请设置',
            self::getIntegralMoney.'.required' => '请设置',
            self::getBonus.'.required' => '请设置',
            self::getOrderAmount.'.required' => '请设置',
            self::getFromAd.'.required' => '请设置',
            self::getReferer.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getConfirmTime.'.required' => '请设置',
            self::getPayTime.'.required' => '请设置',
            self::getShippingTime.'.required' => '请设置',
            self::getPackId.'.required' => '请设置',
            self::getCardId.'.required' => '请设置',
            self::getBonusId.'.required' => '请设置',
            self::getInvoiceNo.'.required' => '请设置',
            self::getExtensionCode.'.required' => '请设置',
            self::getExtensionId.'.required' => '请设置',
            self::getToBuyer.'.required' => '请设置',
            self::getPayNote.'.required' => '请设置',
            self::getAgencyId.'.required' => '请设置',
            self::getInvType.'.required' => '请设置',
            self::getTax.'.required' => '请设置',
            self::getIsSeparate.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getDiscount.'.required' => '请设置',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Goods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsUpdateRequest',
    required: [
        self::getGoodsId,
        self::getCatId,
        self::getGoodsSn,
        self::getGoodsName,
        self::getGoodsNameStyle,
        self::getClickCount,
        self::getBrandId,
        self::getProviderName,
        self::getGoodsNumber,
        self::getGoodsWeight,
        self::getMarketPrice,
        self::getShopPrice,
        self::getPromotePrice,
        self::getPromoteStartDate,
        self::getPromoteEndDate,
        self::getWarnNumber,
        self::getKeywords,
        self::getGoodsBrief,
        self::getGoodsDesc,
        self::getGoodsThumb,
        self::getGoodsImg,
        self::getOriginalImg,
        self::getIsReal,
        self::getExtensionCode,
        self::getIsOnSale,
        self::getIsAloneSale,
        self::getIsShipping,
        self::getIntegral,
        self::getAddTime,
        self::getSortOrder,
        self::getIsDelete,
        self::getIsBest,
        self::getIsNew,
        self::getIsHot,
        self::getIsPromote,
        self::getBonusTypeId,
        self::getLastUpdate,
        self::getGoodsType,
        self::getSellerNote,
        self::getGiveIntegral,
        self::getRankIntegral,
        self::getSuppliersId,
        self::getIsCheck,
    ],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsNameStyle, description: '', type: 'string'),
        new OA\Property(property: self::getClickCount, description: '', type: 'integer'),
        new OA\Property(property: self::getBrandId, description: '', type: 'integer'),
        new OA\Property(property: self::getProviderName, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsWeight, description: '', type: 'string'),
        new OA\Property(property: self::getMarketPrice, description: '', type: 'string'),
        new OA\Property(property: self::getShopPrice, description: '', type: 'string'),
        new OA\Property(property: self::getPromotePrice, description: '', type: 'string'),
        new OA\Property(property: self::getPromoteStartDate, description: '', type: 'integer'),
        new OA\Property(property: self::getPromoteEndDate, description: '', type: 'integer'),
        new OA\Property(property: self::getWarnNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getKeywords, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsBrief, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsDesc, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsThumb, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsImg, description: '', type: 'string'),
        new OA\Property(property: self::getOriginalImg, description: '', type: 'string'),
        new OA\Property(property: self::getIsReal, description: '', type: 'integer'),
        new OA\Property(property: self::getExtensionCode, description: '', type: 'string'),
        new OA\Property(property: self::getIsOnSale, description: '', type: 'integer'),
        new OA\Property(property: self::getIsAloneSale, description: '', type: 'integer'),
        new OA\Property(property: self::getIsShipping, description: '', type: 'integer'),
        new OA\Property(property: self::getIntegral, description: '', type: 'integer'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getIsDelete, description: '', type: 'integer'),
        new OA\Property(property: self::getIsBest, description: '', type: 'integer'),
        new OA\Property(property: self::getIsNew, description: '', type: 'integer'),
        new OA\Property(property: self::getIsHot, description: '', type: 'integer'),
        new OA\Property(property: self::getIsPromote, description: '', type: 'integer'),
        new OA\Property(property: self::getBonusTypeId, description: '', type: 'integer'),
        new OA\Property(property: self::getLastUpdate, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsType, description: '', type: 'integer'),
        new OA\Property(property: self::getSellerNote, description: '', type: 'string'),
        new OA\Property(property: self::getGiveIntegral, description: '', type: 'integer'),
        new OA\Property(property: self::getRankIntegral, description: '', type: 'integer'),
        new OA\Property(property: self::getSuppliersId, description: '', type: 'integer'),
        new OA\Property(property: self::getIsCheck, description: '', type: 'integer'),
    ]
)]
class GoodsUpdateRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getCatId = 'catId';

    const string getGoodsSn = 'goodsSn';

    const string getGoodsName = 'goodsName';

    const string getGoodsNameStyle = 'goodsNameStyle';

    const string getClickCount = 'clickCount';

    const string getBrandId = 'brandId';

    const string getProviderName = 'providerName';

    const string getGoodsNumber = 'goodsNumber';

    const string getGoodsWeight = 'goodsWeight';

    const string getMarketPrice = 'marketPrice';

    const string getShopPrice = 'shopPrice';

    const string getPromotePrice = 'promotePrice';

    const string getPromoteStartDate = 'promoteStartDate';

    const string getPromoteEndDate = 'promoteEndDate';

    const string getWarnNumber = 'warnNumber';

    const string getKeywords = 'keywords';

    const string getGoodsBrief = 'goodsBrief';

    const string getGoodsDesc = 'goodsDesc';

    const string getGoodsThumb = 'goodsThumb';

    const string getGoodsImg = 'goodsImg';

    const string getOriginalImg = 'originalImg';

    const string getIsReal = 'isReal';

    const string getExtensionCode = 'extensionCode';

    const string getIsOnSale = 'isOnSale';

    const string getIsAloneSale = 'isAloneSale';

    const string getIsShipping = 'isShipping';

    const string getIntegral = 'integral';

    const string getAddTime = 'addTime';

    const string getSortOrder = 'sortOrder';

    const string getIsDelete = 'isDelete';

    const string getIsBest = 'isBest';

    const string getIsNew = 'isNew';

    const string getIsHot = 'isHot';

    const string getIsPromote = 'isPromote';

    const string getBonusTypeId = 'bonusTypeId';

    const string getLastUpdate = 'lastUpdate';

    const string getGoodsType = 'goodsType';

    const string getSellerNote = 'sellerNote';

    const string getGiveIntegral = 'giveIntegral';

    const string getRankIntegral = 'rankIntegral';

    const string getSuppliersId = 'suppliersId';

    const string getIsCheck = 'isCheck';

    public function rules(): array
    {
        return [
            self::getGoodsId => 'required',
            self::getCatId => 'required',
            self::getGoodsSn => 'required',
            self::getGoodsName => 'required',
            self::getGoodsNameStyle => 'required',
            self::getClickCount => 'required',
            self::getBrandId => 'required',
            self::getProviderName => 'required',
            self::getGoodsNumber => 'required',
            self::getGoodsWeight => 'required',
            self::getMarketPrice => 'required',
            self::getShopPrice => 'required',
            self::getPromotePrice => 'required',
            self::getPromoteStartDate => 'required',
            self::getPromoteEndDate => 'required',
            self::getWarnNumber => 'required',
            self::getKeywords => 'required',
            self::getGoodsBrief => 'required',
            self::getGoodsDesc => 'required',
            self::getGoodsThumb => 'required',
            self::getGoodsImg => 'required',
            self::getOriginalImg => 'required',
            self::getIsReal => 'required',
            self::getExtensionCode => 'required',
            self::getIsOnSale => 'required',
            self::getIsAloneSale => 'required',
            self::getIsShipping => 'required',
            self::getIntegral => 'required',
            self::getAddTime => 'required',
            self::getSortOrder => 'required',
            self::getIsDelete => 'required',
            self::getIsBest => 'required',
            self::getIsNew => 'required',
            self::getIsHot => 'required',
            self::getIsPromote => 'required',
            self::getBonusTypeId => 'required',
            self::getLastUpdate => 'required',
            self::getGoodsType => 'required',
            self::getSellerNote => 'required',
            self::getGiveIntegral => 'required',
            self::getRankIntegral => 'required',
            self::getSuppliersId => 'required',
            self::getIsCheck => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsId.'.required' => '请设置',
            self::getCatId.'.required' => '请设置',
            self::getGoodsSn.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getGoodsNameStyle.'.required' => '请设置',
            self::getClickCount.'.required' => '请设置',
            self::getBrandId.'.required' => '请设置',
            self::getProviderName.'.required' => '请设置',
            self::getGoodsNumber.'.required' => '请设置',
            self::getGoodsWeight.'.required' => '请设置',
            self::getMarketPrice.'.required' => '请设置',
            self::getShopPrice.'.required' => '请设置',
            self::getPromotePrice.'.required' => '请设置',
            self::getPromoteStartDate.'.required' => '请设置',
            self::getPromoteEndDate.'.required' => '请设置',
            self::getWarnNumber.'.required' => '请设置',
            self::getKeywords.'.required' => '请设置',
            self::getGoodsBrief.'.required' => '请设置',
            self::getGoodsDesc.'.required' => '请设置',
            self::getGoodsThumb.'.required' => '请设置',
            self::getGoodsImg.'.required' => '请设置',
            self::getOriginalImg.'.required' => '请设置',
            self::getIsReal.'.required' => '请设置',
            self::getExtensionCode.'.required' => '请设置',
            self::getIsOnSale.'.required' => '请设置',
            self::getIsAloneSale.'.required' => '请设置',
            self::getIsShipping.'.required' => '请设置',
            self::getIntegral.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getIsDelete.'.required' => '请设置',
            self::getIsBest.'.required' => '请设置',
            self::getIsNew.'.required' => '请设置',
            self::getIsHot.'.required' => '请设置',
            self::getIsPromote.'.required' => '请设置',
            self::getBonusTypeId.'.required' => '请设置',
            self::getLastUpdate.'.required' => '请设置',
            self::getGoodsType.'.required' => '请设置',
            self::getSellerNote.'.required' => '请设置',
            self::getGiveIntegral.'.required' => '请设置',
            self::getRankIntegral.'.required' => '请设置',
            self::getSuppliersId.'.required' => '请设置',
            self::getIsCheck.'.required' => '请设置',
        ];
    }
}

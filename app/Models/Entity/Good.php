<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodSchema')]
class Good
{
    use ArrayObject;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'goods_sn', description: '', type: 'string')]
    protected string $goodsSn;

    #[OA\Property(property: 'goods_name', description: '', type: 'string')]
    protected string $goodsName;

    #[OA\Property(property: 'goods_name_style', description: '', type: 'string')]
    protected string $goodsNameStyle;

    #[OA\Property(property: 'click_count', description: '', type: 'integer')]
    protected int $clickCount;

    #[OA\Property(property: 'brand_id', description: '', type: 'integer')]
    protected int $brandId;

    #[OA\Property(property: 'provider_name', description: '', type: 'string')]
    protected string $providerName;

    #[OA\Property(property: 'goods_number', description: '', type: 'integer')]
    protected int $goodsNumber;

    #[OA\Property(property: 'goods_weight', description: '', type: 'float')]
    protected float $goodsWeight;

    #[OA\Property(property: 'market_price', description: '', type: 'float')]
    protected float $marketPrice;

    #[OA\Property(property: 'shop_price', description: '', type: 'float')]
    protected float $shopPrice;

    #[OA\Property(property: 'promote_price', description: '', type: 'float')]
    protected float $promotePrice;

    #[OA\Property(property: 'promote_start_date', description: '', type: 'integer')]
    protected int $promoteStartDate;

    #[OA\Property(property: 'promote_end_date', description: '', type: 'integer')]
    protected int $promoteEndDate;

    #[OA\Property(property: 'warn_number', description: '', type: 'integer')]
    protected int $warnNumber;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    protected string $keywords;

    #[OA\Property(property: 'goods_brief', description: '', type: 'string')]
    protected string $goodsBrief;

    #[OA\Property(property: 'goods_desc', description: '', type: 'string')]
    protected string $goodsDesc;

    #[OA\Property(property: 'goods_thumb', description: '', type: 'string')]
    protected string $goodsThumb;

    #[OA\Property(property: 'goods_img', description: '', type: 'string')]
    protected string $goodsImg;

    #[OA\Property(property: 'original_img', description: '', type: 'string')]
    protected string $originalImg;

    #[OA\Property(property: 'is_real', description: '', type: 'integer')]
    protected int $isReal;

    #[OA\Property(property: 'extension_code', description: '', type: 'string')]
    protected string $extensionCode;

    #[OA\Property(property: 'is_on_sale', description: '', type: 'integer')]
    protected int $isOnSale;

    #[OA\Property(property: 'is_alone_sale', description: '', type: 'integer')]
    protected int $isAloneSale;

    #[OA\Property(property: 'is_shipping', description: '', type: 'integer')]
    protected int $isShipping;

    #[OA\Property(property: 'integral', description: '', type: 'integer')]
    protected int $integral;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    #[OA\Property(property: 'is_delete', description: '', type: 'integer')]
    protected int $isDelete;

    #[OA\Property(property: 'is_best', description: '', type: 'integer')]
    protected int $isBest;

    #[OA\Property(property: 'is_new', description: '', type: 'integer')]
    protected int $isNew;

    #[OA\Property(property: 'is_hot', description: '', type: 'integer')]
    protected int $isHot;

    #[OA\Property(property: 'is_promote', description: '', type: 'integer')]
    protected int $isPromote;

    #[OA\Property(property: 'bonus_type_id', description: '', type: 'integer')]
    protected int $bonusTypeId;

    #[OA\Property(property: 'last_update', description: '', type: 'integer')]
    protected int $lastUpdate;

    #[OA\Property(property: 'goods_type', description: '', type: 'integer')]
    protected int $goodsType;

    #[OA\Property(property: 'seller_note', description: '', type: 'string')]
    protected string $sellerNote;

    #[OA\Property(property: 'give_integral', description: '', type: 'integer')]
    protected int $giveIntegral;

    #[OA\Property(property: 'rank_integral', description: '', type: 'integer')]
    protected int $rankIntegral;

    #[OA\Property(property: 'suppliers_id', description: '', type: 'integer')]
    protected int $suppliersId;

    #[OA\Property(property: 'is_check', description: '', type: 'integer')]
    protected int $isCheck;

    /**
     * 获取
     */
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * 获取
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * 获取
     */
    public function getGoodsSn(): string
    {
        return $this->goodsSn;
    }

    /**
     * 设置
     */
    public function setGoodsSn(string $goodsSn): void
    {
        $this->goodsSn = $goodsSn;
    }

    /**
     * 获取
     */
    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    /**
     * 设置
     */
    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    /**
     * 获取
     */
    public function getGoodsNameStyle(): string
    {
        return $this->goodsNameStyle;
    }

    /**
     * 设置
     */
    public function setGoodsNameStyle(string $goodsNameStyle): void
    {
        $this->goodsNameStyle = $goodsNameStyle;
    }

    /**
     * 获取
     */
    public function getClickCount(): int
    {
        return $this->clickCount;
    }

    /**
     * 设置
     */
    public function setClickCount(int $clickCount): void
    {
        $this->clickCount = $clickCount;
    }

    /**
     * 获取
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * 设置
     */
    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
    }

    /**
     * 获取
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

    /**
     * 设置
     */
    public function setProviderName(string $providerName): void
    {
        $this->providerName = $providerName;
    }

    /**
     * 获取
     */
    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    /**
     * 设置
     */
    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
    }

    /**
     * 获取
     */
    public function getGoodsWeight(): float
    {
        return $this->goodsWeight;
    }

    /**
     * 设置
     */
    public function setGoodsWeight(float $goodsWeight): void
    {
        $this->goodsWeight = $goodsWeight;
    }

    /**
     * 获取
     */
    public function getMarketPrice(): float
    {
        return $this->marketPrice;
    }

    /**
     * 设置
     */
    public function setMarketPrice(float $marketPrice): void
    {
        $this->marketPrice = $marketPrice;
    }

    /**
     * 获取
     */
    public function getShopPrice(): float
    {
        return $this->shopPrice;
    }

    /**
     * 设置
     */
    public function setShopPrice(float $shopPrice): void
    {
        $this->shopPrice = $shopPrice;
    }

    /**
     * 获取
     */
    public function getPromotePrice(): float
    {
        return $this->promotePrice;
    }

    /**
     * 设置
     */
    public function setPromotePrice(float $promotePrice): void
    {
        $this->promotePrice = $promotePrice;
    }

    /**
     * 获取
     */
    public function getPromoteStartDate(): int
    {
        return $this->promoteStartDate;
    }

    /**
     * 设置
     */
    public function setPromoteStartDate(int $promoteStartDate): void
    {
        $this->promoteStartDate = $promoteStartDate;
    }

    /**
     * 获取
     */
    public function getPromoteEndDate(): int
    {
        return $this->promoteEndDate;
    }

    /**
     * 设置
     */
    public function setPromoteEndDate(int $promoteEndDate): void
    {
        $this->promoteEndDate = $promoteEndDate;
    }

    /**
     * 获取
     */
    public function getWarnNumber(): int
    {
        return $this->warnNumber;
    }

    /**
     * 设置
     */
    public function setWarnNumber(int $warnNumber): void
    {
        $this->warnNumber = $warnNumber;
    }

    /**
     * 获取
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * 设置
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * 获取
     */
    public function getGoodsBrief(): string
    {
        return $this->goodsBrief;
    }

    /**
     * 设置
     */
    public function setGoodsBrief(string $goodsBrief): void
    {
        $this->goodsBrief = $goodsBrief;
    }

    /**
     * 获取
     */
    public function getGoodsDesc(): string
    {
        return $this->goodsDesc;
    }

    /**
     * 设置
     */
    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goodsDesc = $goodsDesc;
    }

    /**
     * 获取
     */
    public function getGoodsThumb(): string
    {
        return $this->goodsThumb;
    }

    /**
     * 设置
     */
    public function setGoodsThumb(string $goodsThumb): void
    {
        $this->goodsThumb = $goodsThumb;
    }

    /**
     * 获取
     */
    public function getGoodsImg(): string
    {
        return $this->goodsImg;
    }

    /**
     * 设置
     */
    public function setGoodsImg(string $goodsImg): void
    {
        $this->goodsImg = $goodsImg;
    }

    /**
     * 获取
     */
    public function getOriginalImg(): string
    {
        return $this->originalImg;
    }

    /**
     * 设置
     */
    public function setOriginalImg(string $originalImg): void
    {
        $this->originalImg = $originalImg;
    }

    /**
     * 获取
     */
    public function getIsReal(): int
    {
        return $this->isReal;
    }

    /**
     * 设置
     */
    public function setIsReal(int $isReal): void
    {
        $this->isReal = $isReal;
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
    public function getIsOnSale(): int
    {
        return $this->isOnSale;
    }

    /**
     * 设置
     */
    public function setIsOnSale(int $isOnSale): void
    {
        $this->isOnSale = $isOnSale;
    }

    /**
     * 获取
     */
    public function getIsAloneSale(): int
    {
        return $this->isAloneSale;
    }

    /**
     * 设置
     */
    public function setIsAloneSale(int $isAloneSale): void
    {
        $this->isAloneSale = $isAloneSale;
    }

    /**
     * 获取
     */
    public function getIsShipping(): int
    {
        return $this->isShipping;
    }

    /**
     * 设置
     */
    public function setIsShipping(int $isShipping): void
    {
        $this->isShipping = $isShipping;
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
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * 获取
     */
    public function getIsDelete(): int
    {
        return $this->isDelete;
    }

    /**
     * 设置
     */
    public function setIsDelete(int $isDelete): void
    {
        $this->isDelete = $isDelete;
    }

    /**
     * 获取
     */
    public function getIsBest(): int
    {
        return $this->isBest;
    }

    /**
     * 设置
     */
    public function setIsBest(int $isBest): void
    {
        $this->isBest = $isBest;
    }

    /**
     * 获取
     */
    public function getIsNew(): int
    {
        return $this->isNew;
    }

    /**
     * 设置
     */
    public function setIsNew(int $isNew): void
    {
        $this->isNew = $isNew;
    }

    /**
     * 获取
     */
    public function getIsHot(): int
    {
        return $this->isHot;
    }

    /**
     * 设置
     */
    public function setIsHot(int $isHot): void
    {
        $this->isHot = $isHot;
    }

    /**
     * 获取
     */
    public function getIsPromote(): int
    {
        return $this->isPromote;
    }

    /**
     * 设置
     */
    public function setIsPromote(int $isPromote): void
    {
        $this->isPromote = $isPromote;
    }

    /**
     * 获取
     */
    public function getBonusTypeId(): int
    {
        return $this->bonusTypeId;
    }

    /**
     * 设置
     */
    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonusTypeId = $bonusTypeId;
    }

    /**
     * 获取
     */
    public function getLastUpdate(): int
    {
        return $this->lastUpdate;
    }

    /**
     * 设置
     */
    public function setLastUpdate(int $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    /**
     * 获取
     */
    public function getGoodsType(): int
    {
        return $this->goodsType;
    }

    /**
     * 设置
     */
    public function setGoodsType(int $goodsType): void
    {
        $this->goodsType = $goodsType;
    }

    /**
     * 获取
     */
    public function getSellerNote(): string
    {
        return $this->sellerNote;
    }

    /**
     * 设置
     */
    public function setSellerNote(string $sellerNote): void
    {
        $this->sellerNote = $sellerNote;
    }

    /**
     * 获取
     */
    public function getGiveIntegral(): int
    {
        return $this->giveIntegral;
    }

    /**
     * 设置
     */
    public function setGiveIntegral(int $giveIntegral): void
    {
        $this->giveIntegral = $giveIntegral;
    }

    /**
     * 获取
     */
    public function getRankIntegral(): int
    {
        return $this->rankIntegral;
    }

    /**
     * 设置
     */
    public function setRankIntegral(int $rankIntegral): void
    {
        $this->rankIntegral = $rankIntegral;
    }

    /**
     * 获取
     */
    public function getSuppliersId(): int
    {
        return $this->suppliersId;
    }

    /**
     * 设置
     */
    public function setSuppliersId(int $suppliersId): void
    {
        $this->suppliersId = $suppliersId;
    }

    /**
     * 获取
     */
    public function getIsCheck(): int
    {
        return $this->isCheck;
    }

    /**
     * 设置
     */
    public function setIsCheck(int $isCheck): void
    {
        $this->isCheck = $isCheck;
    }
}

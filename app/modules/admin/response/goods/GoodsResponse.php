<?php

declare(strict_types=1);

namespace app\modules\admin\response\goods;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsResponse')]
class GoodsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '商品ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catId', description: '商品分类ID', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'goodsSn', description: '商品货号', type: 'string')]
    private string $goodsSn;

    #[OA\Property(property: 'goodsName', description: '商品名称', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'goodsNameStyle', description: '商品名称样式', type: 'string')]
    private string $goodsNameStyle;

    #[OA\Property(property: 'clickCount', description: '点击次数', type: 'integer')]
    private int $clickCount;

    #[OA\Property(property: 'brandId', description: '品牌ID', type: 'integer')]
    private int $brandId;

    #[OA\Property(property: 'providerName', description: '供应商名称', type: 'string')]
    private string $providerName;

    #[OA\Property(property: 'goodsNumber', description: '库存数量', type: 'integer')]
    private int $goodsNumber;

    #[OA\Property(property: 'goodsWeight', description: '商品重量(kg)', type: 'float')]
    private float $goodsWeight;

    #[OA\Property(property: 'marketPrice', description: '市场价', type: 'float')]
    private float $marketPrice;

    #[OA\Property(property: 'shopPrice', description: '本店售价', type: 'float')]
    private float $shopPrice;

    #[OA\Property(property: 'promotePrice', description: '促销价格', type: 'float')]
    private float $promotePrice;

    #[OA\Property(property: 'promoteStartDate', description: '促销开始时间', type: 'integer')]
    private int $promoteStartDate;

    #[OA\Property(property: 'promoteEndDate', description: '促销结束时间', type: 'integer')]
    private int $promoteEndDate;

    #[OA\Property(property: 'warnNumber', description: '库存警告数量', type: 'integer')]
    private int $warnNumber;

    #[OA\Property(property: 'keywords', description: '商品关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'goodsBrief', description: '商品简介', type: 'string')]
    private string $goodsBrief;

    #[OA\Property(property: 'goodsDesc', description: '商品详细描述', type: 'string')]
    private string $goodsDesc;

    #[OA\Property(property: 'goodsThumb', description: '商品缩略图', type: 'string')]
    private string $goodsThumb;

    #[OA\Property(property: 'goodsImg', description: '商品图片', type: 'string')]
    private string $goodsImg;

    #[OA\Property(property: 'originalImg', description: '商品原图', type: 'string')]
    private string $originalImg;

    #[OA\Property(property: 'isReal', description: '是否实物商品(1是 0否)', type: 'integer')]
    private int $isReal;

    #[OA\Property(property: 'extensionCode', description: '商品扩展代码', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'isOnSale', description: '是否上架(1是 0否)', type: 'integer')]
    private int $isOnSale;

    #[OA\Property(property: 'isAloneSale', description: '是否单独销售(1是 0否)', type: 'integer')]
    private int $isAloneSale;

    #[OA\Property(property: 'isShipping', description: '是否免运费(1是 0否)', type: 'integer')]
    private int $isShipping;

    #[OA\Property(property: 'integral', description: '积分购买金额', type: 'integer')]
    private int $integral;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'sortOrder', description: '排序权重', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'isDelete', description: '是否删除(1是 0否)', type: 'integer')]
    private int $isDelete;

    #[OA\Property(property: 'isBest', description: '是否精品(1是 0否)', type: 'integer')]
    private int $isBest;

    #[OA\Property(property: 'isNew', description: '是否新品(1是 0否)', type: 'integer')]
    private int $isNew;

    #[OA\Property(property: 'isHot', description: '是否热销(1是 0否)', type: 'integer')]
    private int $isHot;

    #[OA\Property(property: 'isPromote', description: '是否促销(1是 0否)', type: 'integer')]
    private int $isPromote;

    #[OA\Property(property: 'bonusTypeId', description: '红包类型ID', type: 'integer')]
    private int $bonusTypeId;

    #[OA\Property(property: 'lastUpdate', description: '最后更新时间', type: 'integer')]
    private int $lastUpdate;

    #[OA\Property(property: 'goodsType', description: '商品类型ID', type: 'integer')]
    private int $goodsType;

    #[OA\Property(property: 'sellerNote', description: '商家备注', type: 'string')]
    private string $sellerNote;

    #[OA\Property(property: 'giveIntegral', description: '赠送积分', type: 'integer')]
    private int $giveIntegral;

    #[OA\Property(property: 'rankIntegral', description: '等级积分', type: 'integer')]
    private int $rankIntegral;

    #[OA\Property(property: 'supplierId', description: '供应商ID', type: 'integer')]
    private int $supplierId;

    #[OA\Property(property: 'isCheck', description: '是否审核(1是 0否)', type: 'integer')]
    private int $isCheck;

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

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    public function getGoodsSn(): string
    {
        return $this->goodsSn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goodsSn = $goodsSn;
    }

    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    public function getGoodsNameStyle(): string
    {
        return $this->goodsNameStyle;
    }

    public function setGoodsNameStyle(string $goodsNameStyle): void
    {
        $this->goodsNameStyle = $goodsNameStyle;
    }

    public function getClickCount(): int
    {
        return $this->clickCount;
    }

    public function setClickCount(int $clickCount): void
    {
        $this->clickCount = $clickCount;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }

    public function setProviderName(string $providerName): void
    {
        $this->providerName = $providerName;
    }

    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
    }

    public function getGoodsWeight(): float
    {
        return $this->goodsWeight;
    }

    public function setGoodsWeight(float $goodsWeight): void
    {
        $this->goodsWeight = $goodsWeight;
    }

    public function getMarketPrice(): float
    {
        return $this->marketPrice;
    }

    public function setMarketPrice(float $marketPrice): void
    {
        $this->marketPrice = $marketPrice;
    }

    public function getShopPrice(): float
    {
        return $this->shopPrice;
    }

    public function setShopPrice(float $shopPrice): void
    {
        $this->shopPrice = $shopPrice;
    }

    public function getPromotePrice(): float
    {
        return $this->promotePrice;
    }

    public function setPromotePrice(float $promotePrice): void
    {
        $this->promotePrice = $promotePrice;
    }

    public function getPromoteStartDate(): int
    {
        return $this->promoteStartDate;
    }

    public function setPromoteStartDate(int $promoteStartDate): void
    {
        $this->promoteStartDate = $promoteStartDate;
    }

    public function getPromoteEndDate(): int
    {
        return $this->promoteEndDate;
    }

    public function setPromoteEndDate(int $promoteEndDate): void
    {
        $this->promoteEndDate = $promoteEndDate;
    }

    public function getWarnNumber(): int
    {
        return $this->warnNumber;
    }

    public function setWarnNumber(int $warnNumber): void
    {
        $this->warnNumber = $warnNumber;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getGoodsBrief(): string
    {
        return $this->goodsBrief;
    }

    public function setGoodsBrief(string $goodsBrief): void
    {
        $this->goodsBrief = $goodsBrief;
    }

    public function getGoodsDesc(): string
    {
        return $this->goodsDesc;
    }

    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goodsDesc = $goodsDesc;
    }

    public function getGoodsThumb(): string
    {
        return $this->goodsThumb;
    }

    public function setGoodsThumb(string $goodsThumb): void
    {
        $this->goodsThumb = $goodsThumb;
    }

    public function getGoodsImg(): string
    {
        return $this->goodsImg;
    }

    public function setGoodsImg(string $goodsImg): void
    {
        $this->goodsImg = $goodsImg;
    }

    public function getOriginalImg(): string
    {
        return $this->originalImg;
    }

    public function setOriginalImg(string $originalImg): void
    {
        $this->originalImg = $originalImg;
    }

    public function getIsReal(): int
    {
        return $this->isReal;
    }

    public function setIsReal(int $isReal): void
    {
        $this->isReal = $isReal;
    }

    public function getExtensionCode(): string
    {
        return $this->extensionCode;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extensionCode = $extensionCode;
    }

    public function getIsOnSale(): int
    {
        return $this->isOnSale;
    }

    public function setIsOnSale(int $isOnSale): void
    {
        $this->isOnSale = $isOnSale;
    }

    public function getIsAloneSale(): int
    {
        return $this->isAloneSale;
    }

    public function setIsAloneSale(int $isAloneSale): void
    {
        $this->isAloneSale = $isAloneSale;
    }

    public function getIsShipping(): int
    {
        return $this->isShipping;
    }

    public function setIsShipping(int $isShipping): void
    {
        $this->isShipping = $isShipping;
    }

    public function getIntegral(): int
    {
        return $this->integral;
    }

    public function setIntegral(int $integral): void
    {
        $this->integral = $integral;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    public function getIsDelete(): int
    {
        return $this->isDelete;
    }

    public function setIsDelete(int $isDelete): void
    {
        $this->isDelete = $isDelete;
    }

    public function getIsBest(): int
    {
        return $this->isBest;
    }

    public function setIsBest(int $isBest): void
    {
        $this->isBest = $isBest;
    }

    public function getIsNew(): int
    {
        return $this->isNew;
    }

    public function setIsNew(int $isNew): void
    {
        $this->isNew = $isNew;
    }

    public function getIsHot(): int
    {
        return $this->isHot;
    }

    public function setIsHot(int $isHot): void
    {
        $this->isHot = $isHot;
    }

    public function getIsPromote(): int
    {
        return $this->isPromote;
    }

    public function setIsPromote(int $isPromote): void
    {
        $this->isPromote = $isPromote;
    }

    public function getBonusTypeId(): int
    {
        return $this->bonusTypeId;
    }

    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonusTypeId = $bonusTypeId;
    }

    public function getLastUpdate(): int
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(int $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getGoodsType(): int
    {
        return $this->goodsType;
    }

    public function setGoodsType(int $goodsType): void
    {
        $this->goodsType = $goodsType;
    }

    public function getSellerNote(): string
    {
        return $this->sellerNote;
    }

    public function setSellerNote(string $sellerNote): void
    {
        $this->sellerNote = $sellerNote;
    }

    public function getGiveIntegral(): int
    {
        return $this->giveIntegral;
    }

    public function setGiveIntegral(int $giveIntegral): void
    {
        $this->giveIntegral = $giveIntegral;
    }

    public function getRankIntegral(): int
    {
        return $this->rankIntegral;
    }

    public function setRankIntegral(int $rankIntegral): void
    {
        $this->rankIntegral = $rankIntegral;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function getIsCheck(): int
    {
        return $this->isCheck;
    }

    public function setIsCheck(int $isCheck): void
    {
        $this->isCheck = $isCheck;
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

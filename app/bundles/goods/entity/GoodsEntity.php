<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsEntity')]
class GoodsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '商品ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_id', description: '商品分类ID', type: 'integer')]
    private int $cat_id;

    #[OA\Property(property: 'goods_sn', description: '商品货号', type: 'string')]
    private string $goods_sn;

    #[OA\Property(property: 'goods_name', description: '商品名称', type: 'string')]
    private string $goods_name;

    #[OA\Property(property: 'goods_name_style', description: '商品名称样式', type: 'string')]
    private string $goods_name_style;

    #[OA\Property(property: 'click_count', description: '点击次数', type: 'integer')]
    private int $click_count;

    #[OA\Property(property: 'brand_id', description: '品牌ID', type: 'integer')]
    private int $brand_id;

    #[OA\Property(property: 'provider_name', description: '供应商名称', type: 'string')]
    private string $provider_name;

    #[OA\Property(property: 'goods_number', description: '库存数量', type: 'integer')]
    private int $goods_number;

    #[OA\Property(property: 'goods_weight', description: '商品重量(kg)', type: 'float')]
    private float $goods_weight;

    #[OA\Property(property: 'market_price', description: '市场价', type: 'float')]
    private float $market_price;

    #[OA\Property(property: 'shop_price', description: '本店售价', type: 'float')]
    private float $shop_price;

    #[OA\Property(property: 'promote_price', description: '促销价格', type: 'float')]
    private float $promote_price;

    #[OA\Property(property: 'promote_start_date', description: '促销开始时间', type: 'integer')]
    private int $promote_start_date;

    #[OA\Property(property: 'promote_end_date', description: '促销结束时间', type: 'integer')]
    private int $promote_end_date;

    #[OA\Property(property: 'warn_number', description: '库存警告数量', type: 'integer')]
    private int $warn_number;

    #[OA\Property(property: 'keywords', description: '商品关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'goods_brief', description: '商品简介', type: 'string')]
    private string $goods_brief;

    #[OA\Property(property: 'goods_desc', description: '商品详细描述', type: 'string')]
    private string $goods_desc;

    #[OA\Property(property: 'goods_thumb', description: '商品缩略图', type: 'string')]
    private string $goods_thumb;

    #[OA\Property(property: 'goods_img', description: '商品图片', type: 'string')]
    private string $goods_img;

    #[OA\Property(property: 'original_img', description: '商品原图', type: 'string')]
    private string $original_img;

    #[OA\Property(property: 'is_real', description: '是否实物商品(1是 0否)', type: 'integer')]
    private int $is_real;

    #[OA\Property(property: 'extension_code', description: '商品扩展代码', type: 'string')]
    private string $extension_code;

    #[OA\Property(property: 'is_on_sale', description: '是否上架(1是 0否)', type: 'integer')]
    private int $is_on_sale;

    #[OA\Property(property: 'is_alone_sale', description: '是否单独销售(1是 0否)', type: 'integer')]
    private int $is_alone_sale;

    #[OA\Property(property: 'is_shipping', description: '是否免运费(1是 0否)', type: 'integer')]
    private int $is_shipping;

    #[OA\Property(property: 'integral', description: '积分购买金额', type: 'integer')]
    private int $integral;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'sort_order', description: '排序权重', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'is_delete', description: '是否删除(1是 0否)', type: 'integer')]
    private int $is_delete;

    #[OA\Property(property: 'is_best', description: '是否精品(1是 0否)', type: 'integer')]
    private int $is_best;

    #[OA\Property(property: 'is_new', description: '是否新品(1是 0否)', type: 'integer')]
    private int $is_new;

    #[OA\Property(property: 'is_hot', description: '是否热销(1是 0否)', type: 'integer')]
    private int $is_hot;

    #[OA\Property(property: 'is_promote', description: '是否促销(1是 0否)', type: 'integer')]
    private int $is_promote;

    #[OA\Property(property: 'bonus_type_id', description: '红包类型ID', type: 'integer')]
    private int $bonus_type_id;

    #[OA\Property(property: 'last_update', description: '最后更新时间', type: 'integer')]
    private int $last_update;

    #[OA\Property(property: 'goods_type', description: '商品类型ID', type: 'integer')]
    private int $goods_type;

    #[OA\Property(property: 'seller_note', description: '商家备注', type: 'string')]
    private string $seller_note;

    #[OA\Property(property: 'give_integral', description: '赠送积分', type: 'integer')]
    private int $give_integral;

    #[OA\Property(property: 'rank_integral', description: '等级积分', type: 'integer')]
    private int $rank_integral;

    #[OA\Property(property: 'supplier_id', description: '供应商ID', type: 'integer')]
    private int $supplier_id;

    #[OA\Property(property: 'is_check', description: '是否审核(1是 0否)', type: 'integer')]
    private int $is_check;

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

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function setCatId(int $catId): void
    {
        $this->cat_id = $catId;
    }

    public function getGoodsSn(): string
    {
        return $this->goods_sn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goods_sn = $goodsSn;
    }

    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goods_name = $goodsName;
    }

    public function getGoodsNameStyle(): string
    {
        return $this->goods_name_style;
    }

    public function setGoodsNameStyle(string $goodsNameStyle): void
    {
        $this->goods_name_style = $goodsNameStyle;
    }

    public function getClickCount(): int
    {
        return $this->click_count;
    }

    public function setClickCount(int $clickCount): void
    {
        $this->click_count = $clickCount;
    }

    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    public function setBrandId(int $brandId): void
    {
        $this->brand_id = $brandId;
    }

    public function getProviderName(): string
    {
        return $this->provider_name;
    }

    public function setProviderName(string $providerName): void
    {
        $this->provider_name = $providerName;
    }

    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goods_number = $goodsNumber;
    }

    public function getGoodsWeight(): float
    {
        return $this->goods_weight;
    }

    public function setGoodsWeight(float $goodsWeight): void
    {
        $this->goods_weight = $goodsWeight;
    }

    public function getMarketPrice(): float
    {
        return $this->market_price;
    }

    public function setMarketPrice(float $marketPrice): void
    {
        $this->market_price = $marketPrice;
    }

    public function getShopPrice(): float
    {
        return $this->shop_price;
    }

    public function setShopPrice(float $shopPrice): void
    {
        $this->shop_price = $shopPrice;
    }

    public function getPromotePrice(): float
    {
        return $this->promote_price;
    }

    public function setPromotePrice(float $promotePrice): void
    {
        $this->promote_price = $promotePrice;
    }

    public function getPromoteStartDate(): int
    {
        return $this->promote_start_date;
    }

    public function setPromoteStartDate(int $promoteStartDate): void
    {
        $this->promote_start_date = $promoteStartDate;
    }

    public function getPromoteEndDate(): int
    {
        return $this->promote_end_date;
    }

    public function setPromoteEndDate(int $promoteEndDate): void
    {
        $this->promote_end_date = $promoteEndDate;
    }

    public function getWarnNumber(): int
    {
        return $this->warn_number;
    }

    public function setWarnNumber(int $warnNumber): void
    {
        $this->warn_number = $warnNumber;
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
        return $this->goods_brief;
    }

    public function setGoodsBrief(string $goodsBrief): void
    {
        $this->goods_brief = $goodsBrief;
    }

    public function getGoodsDesc(): string
    {
        return $this->goods_desc;
    }

    public function setGoodsDesc(string $goodsDesc): void
    {
        $this->goods_desc = $goodsDesc;
    }

    public function getGoodsThumb(): string
    {
        return $this->goods_thumb;
    }

    public function setGoodsThumb(string $goodsThumb): void
    {
        $this->goods_thumb = $goodsThumb;
    }

    public function getGoodsImg(): string
    {
        return $this->goods_img;
    }

    public function setGoodsImg(string $goodsImg): void
    {
        $this->goods_img = $goodsImg;
    }

    public function getOriginalImg(): string
    {
        return $this->original_img;
    }

    public function setOriginalImg(string $originalImg): void
    {
        $this->original_img = $originalImg;
    }

    public function getIsReal(): int
    {
        return $this->is_real;
    }

    public function setIsReal(int $isReal): void
    {
        $this->is_real = $isReal;
    }

    public function getExtensionCode(): string
    {
        return $this->extension_code;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extension_code = $extensionCode;
    }

    public function getIsOnSale(): int
    {
        return $this->is_on_sale;
    }

    public function setIsOnSale(int $isOnSale): void
    {
        $this->is_on_sale = $isOnSale;
    }

    public function getIsAloneSale(): int
    {
        return $this->is_alone_sale;
    }

    public function setIsAloneSale(int $isAloneSale): void
    {
        $this->is_alone_sale = $isAloneSale;
    }

    public function getIsShipping(): int
    {
        return $this->is_shipping;
    }

    public function setIsShipping(int $isShipping): void
    {
        $this->is_shipping = $isShipping;
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
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getIsDelete(): int
    {
        return $this->is_delete;
    }

    public function setIsDelete(int $isDelete): void
    {
        $this->is_delete = $isDelete;
    }

    public function getIsBest(): int
    {
        return $this->is_best;
    }

    public function setIsBest(int $isBest): void
    {
        $this->is_best = $isBest;
    }

    public function getIsNew(): int
    {
        return $this->is_new;
    }

    public function setIsNew(int $isNew): void
    {
        $this->is_new = $isNew;
    }

    public function getIsHot(): int
    {
        return $this->is_hot;
    }

    public function setIsHot(int $isHot): void
    {
        $this->is_hot = $isHot;
    }

    public function getIsPromote(): int
    {
        return $this->is_promote;
    }

    public function setIsPromote(int $isPromote): void
    {
        $this->is_promote = $isPromote;
    }

    public function getBonusTypeId(): int
    {
        return $this->bonus_type_id;
    }

    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonus_type_id = $bonusTypeId;
    }

    public function getLastUpdate(): int
    {
        return $this->last_update;
    }

    public function setLastUpdate(int $lastUpdate): void
    {
        $this->last_update = $lastUpdate;
    }

    public function getGoodsType(): int
    {
        return $this->goods_type;
    }

    public function setGoodsType(int $goodsType): void
    {
        $this->goods_type = $goodsType;
    }

    public function getSellerNote(): string
    {
        return $this->seller_note;
    }

    public function setSellerNote(string $sellerNote): void
    {
        $this->seller_note = $sellerNote;
    }

    public function getGiveIntegral(): int
    {
        return $this->give_integral;
    }

    public function setGiveIntegral(int $giveIntegral): void
    {
        $this->give_integral = $giveIntegral;
    }

    public function getRankIntegral(): int
    {
        return $this->rank_integral;
    }

    public function setRankIntegral(int $rankIntegral): void
    {
        $this->rank_integral = $rankIntegral;
    }

    public function getSupplierId(): int
    {
        return $this->supplier_id;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplier_id = $supplierId;
    }

    public function getIsCheck(): int
    {
        return $this->is_check;
    }

    public function setIsCheck(int $isCheck): void
    {
        $this->is_check = $isCheck;
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

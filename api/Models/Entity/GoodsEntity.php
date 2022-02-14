<?php

namespace App\Models\Entity;

/**
 * Class GoodsEntity
 * @package App\Models\Entity
 */
class GoodsEntity
{
    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $cat_id;

    /**
     * @var string 
     */
    private string $goods_sn;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var string 
     */
    private string $goods_name_style;

    /**
     * @var int 
     */
    private int $click_count;

    /**
     * @var int 
     */
    private int $brand_id;

    /**
     * @var string 
     */
    private string $provider_name;

    /**
     * @var int 
     */
    private int $goods_number;

    /**
     * @var float 
     */
    private float $goods_weight;

    /**
     * @var float 
     */
    private float $market_price;

    /**
     * @var float 
     */
    private float $shop_price;

    /**
     * @var float 
     */
    private float $promote_price;

    /**
     * @var int 
     */
    private int $promote_start_date;

    /**
     * @var int 
     */
    private int $promote_end_date;

    /**
     * @var int 
     */
    private int $warn_number;

    /**
     * @var string 
     */
    private string $keywords;

    /**
     * @var string 
     */
    private string $goods_brief;

    /**
     * @var string 
     */
    private string $goods_desc;

    /**
     * @var string 
     */
    private string $goods_thumb;

    /**
     * @var string 
     */
    private string $goods_img;

    /**
     * @var string 
     */
    private string $original_img;

    /**
     * @var int 
     */
    private int $is_real;

    /**
     * @var string 
     */
    private string $extension_code;

    /**
     * @var int 
     */
    private int $is_on_sale;

    /**
     * @var int 
     */
    private int $is_alone_sale;

    /**
     * @var int 
     */
    private int $is_shipping;

    /**
     * @var int 
     */
    private int $integral;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @var int 
     */
    private int $is_delete;

    /**
     * @var int 
     */
    private int $is_best;

    /**
     * @var int 
     */
    private int $is_new;

    /**
     * @var int 
     */
    private int $is_hot;

    /**
     * @var int 
     */
    private int $is_promote;

    /**
     * @var int 
     */
    private int $bonus_type_id;

    /**
     * @var int 
     */
    private int $last_update;

    /**
     * @var int 
     */
    private int $goods_type;

    /**
     * @var string 
     */
    private string $seller_note;

    /**
     * @var int 
     */
    private int $give_integral;

    /**
     * @var int 
     */
    private int $rank_integral;

    /**
     * @var int 
     */
    private int $suppliers_id;

    /**
     * @var int 
     */
    private int $is_check;

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $value
     */
    public function setCatId(int $value)
    {
        $this->cat_id = $value;
    }

    /**
     * @return string
     */
    public function getGoodsSn(): string
    {
        return $this->goods_sn;
    }

    /**
     * @param string $value
     */
    public function setGoodsSn(string $value)
    {
        $this->goods_sn = $value;
    }

    /**
     * @return string
     */
    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    /**
     * @param string $value
     */
    public function setGoodsName(string $value)
    {
        $this->goods_name = $value;
    }

    /**
     * @return string
     */
    public function getGoodsNameStyle(): string
    {
        return $this->goods_name_style;
    }

    /**
     * @param string $value
     */
    public function setGoodsNameStyle(string $value)
    {
        $this->goods_name_style = $value;
    }

    /**
     * @return int
     */
    public function getClickCount(): int
    {
        return $this->click_count;
    }

    /**
     * @param int $value
     */
    public function setClickCount(int $value)
    {
        $this->click_count = $value;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    /**
     * @param int $value
     */
    public function setBrandId(int $value)
    {
        $this->brand_id = $value;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->provider_name;
    }

    /**
     * @param string $value
     */
    public function setProviderName(string $value)
    {
        $this->provider_name = $value;
    }

    /**
     * @return int
     */
    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    /**
     * @param int $value
     */
    public function setGoodsNumber(int $value)
    {
        $this->goods_number = $value;
    }

    /**
     * @return float
     */
    public function getGoodsWeight(): float
    {
        return $this->goods_weight;
    }

    /**
     * @param float $value
     */
    public function setGoodsWeight(float $value)
    {
        $this->goods_weight = $value;
    }

    /**
     * @return float
     */
    public function getMarketPrice(): float
    {
        return $this->market_price;
    }

    /**
     * @param float $value
     */
    public function setMarketPrice(float $value)
    {
        $this->market_price = $value;
    }

    /**
     * @return float
     */
    public function getShopPrice(): float
    {
        return $this->shop_price;
    }

    /**
     * @param float $value
     */
    public function setShopPrice(float $value)
    {
        $this->shop_price = $value;
    }

    /**
     * @return float
     */
    public function getPromotePrice(): float
    {
        return $this->promote_price;
    }

    /**
     * @param float $value
     */
    public function setPromotePrice(float $value)
    {
        $this->promote_price = $value;
    }

    /**
     * @return int
     */
    public function getPromoteStartDate(): int
    {
        return $this->promote_start_date;
    }

    /**
     * @param int $value
     */
    public function setPromoteStartDate(int $value)
    {
        $this->promote_start_date = $value;
    }

    /**
     * @return int
     */
    public function getPromoteEndDate(): int
    {
        return $this->promote_end_date;
    }

    /**
     * @param int $value
     */
    public function setPromoteEndDate(int $value)
    {
        $this->promote_end_date = $value;
    }

    /**
     * @return int
     */
    public function getWarnNumber(): int
    {
        return $this->warn_number;
    }

    /**
     * @param int $value
     */
    public function setWarnNumber(int $value)
    {
        $this->warn_number = $value;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $value
     */
    public function setKeywords(string $value)
    {
        $this->keywords = $value;
    }

    /**
     * @return string
     */
    public function getGoodsBrief(): string
    {
        return $this->goods_brief;
    }

    /**
     * @param string $value
     */
    public function setGoodsBrief(string $value)
    {
        $this->goods_brief = $value;
    }

    /**
     * @return string
     */
    public function getGoodsDesc(): string
    {
        return $this->goods_desc;
    }

    /**
     * @param string $value
     */
    public function setGoodsDesc(string $value)
    {
        $this->goods_desc = $value;
    }

    /**
     * @return string
     */
    public function getGoodsThumb(): string
    {
        return $this->goods_thumb;
    }

    /**
     * @param string $value
     */
    public function setGoodsThumb(string $value)
    {
        $this->goods_thumb = $value;
    }

    /**
     * @return string
     */
    public function getGoodsImg(): string
    {
        return $this->goods_img;
    }

    /**
     * @param string $value
     */
    public function setGoodsImg(string $value)
    {
        $this->goods_img = $value;
    }

    /**
     * @return string
     */
    public function getOriginalImg(): string
    {
        return $this->original_img;
    }

    /**
     * @param string $value
     */
    public function setOriginalImg(string $value)
    {
        $this->original_img = $value;
    }

    /**
     * @return int
     */
    public function getIsReal(): int
    {
        return $this->is_real;
    }

    /**
     * @param int $value
     */
    public function setIsReal(int $value)
    {
        $this->is_real = $value;
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
    public function getIsOnSale(): int
    {
        return $this->is_on_sale;
    }

    /**
     * @param int $value
     */
    public function setIsOnSale(int $value)
    {
        $this->is_on_sale = $value;
    }

    /**
     * @return int
     */
    public function getIsAloneSale(): int
    {
        return $this->is_alone_sale;
    }

    /**
     * @param int $value
     */
    public function setIsAloneSale(int $value)
    {
        $this->is_alone_sale = $value;
    }

    /**
     * @return int
     */
    public function getIsShipping(): int
    {
        return $this->is_shipping;
    }

    /**
     * @param int $value
     */
    public function setIsShipping(int $value)
    {
        $this->is_shipping = $value;
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
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
    }

    /**
     * @return int
     */
    public function getIsDelete(): int
    {
        return $this->is_delete;
    }

    /**
     * @param int $value
     */
    public function setIsDelete(int $value)
    {
        $this->is_delete = $value;
    }

    /**
     * @return int
     */
    public function getIsBest(): int
    {
        return $this->is_best;
    }

    /**
     * @param int $value
     */
    public function setIsBest(int $value)
    {
        $this->is_best = $value;
    }

    /**
     * @return int
     */
    public function getIsNew(): int
    {
        return $this->is_new;
    }

    /**
     * @param int $value
     */
    public function setIsNew(int $value)
    {
        $this->is_new = $value;
    }

    /**
     * @return int
     */
    public function getIsHot(): int
    {
        return $this->is_hot;
    }

    /**
     * @param int $value
     */
    public function setIsHot(int $value)
    {
        $this->is_hot = $value;
    }

    /**
     * @return int
     */
    public function getIsPromote(): int
    {
        return $this->is_promote;
    }

    /**
     * @param int $value
     */
    public function setIsPromote(int $value)
    {
        $this->is_promote = $value;
    }

    /**
     * @return int
     */
    public function getBonusTypeId(): int
    {
        return $this->bonus_type_id;
    }

    /**
     * @param int $value
     */
    public function setBonusTypeId(int $value)
    {
        $this->bonus_type_id = $value;
    }

    /**
     * @return int
     */
    public function getLastUpdate(): int
    {
        return $this->last_update;
    }

    /**
     * @param int $value
     */
    public function setLastUpdate(int $value)
    {
        $this->last_update = $value;
    }

    /**
     * @return int
     */
    public function getGoodsType(): int
    {
        return $this->goods_type;
    }

    /**
     * @param int $value
     */
    public function setGoodsType(int $value)
    {
        $this->goods_type = $value;
    }

    /**
     * @return string
     */
    public function getSellerNote(): string
    {
        return $this->seller_note;
    }

    /**
     * @param string $value
     */
    public function setSellerNote(string $value)
    {
        $this->seller_note = $value;
    }

    /**
     * @return int
     */
    public function getGiveIntegral(): int
    {
        return $this->give_integral;
    }

    /**
     * @param int $value
     */
    public function setGiveIntegral(int $value)
    {
        $this->give_integral = $value;
    }

    /**
     * @return int
     */
    public function getRankIntegral(): int
    {
        return $this->rank_integral;
    }

    /**
     * @param int $value
     */
    public function setRankIntegral(int $value)
    {
        $this->rank_integral = $value;
    }

    /**
     * @return int
     */
    public function getSuppliersId(): int
    {
        return $this->suppliers_id;
    }

    /**
     * @param int $value
     */
    public function setSuppliersId(int $value)
    {
        $this->suppliers_id = $value;
    }

    /**
     * @return int
     */
    public function getIsCheck(): int
    {
        return $this->is_check;
    }

    /**
     * @param int $value
     */
    public function setIsCheck(int $value)
    {
        $this->is_check = $value;
    }

}
